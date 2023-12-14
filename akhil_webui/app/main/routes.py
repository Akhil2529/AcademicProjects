from flask import render_template, request, redirect, url_for,make_response
from . import main_bp
from .graph_data_code import author_list, venue_list, paper_list, author_name_list
from pymongo import MongoClient
import networkx as nx
from pyvis.network import Network
import numpy as np
from flask import session, jsonify



client = MongoClient('mongodb://localhost:27017/')  
db = client['co_author_data']  
collection = db['data']


@main_bp.route('/')
def index():
    authors_list = author_list()
    return render_template('index.html', authors=authors_list)

@main_bp.route('/co_authors')
def co_authorship():
    authors_list = author_list()
    return render_template('coauthor_search_index.html', authors=authors_list)

@main_bp.route('/selected_authors',methods=['POST'])
def selected_authors():
    author_nlist = author_name_list() 
    author1_id = f"Author_{request.form['author1_id']}"
    author2_id = f"Author_{request.form['author2_id']}"
    author1_name = f"{request.form['author1_name']}"
    author2_name = f"{request.form['author2_name']}"
    author_nlist = author_name_list()

    if author1_name:
        author1_id = f"Author_{np.where(author_nlist== author1_name)[0][0]}"
    if author2_name:
        author2_id = f"Author_{np.where(author_nlist== author2_name)[0][0]}"
    
    print(author1_id,author2_id,author1_name,author2_name, request)

    query1 = {"source_node": author1_id, "relation": "PA"}
    matching_documents = collection.find(query1)
    list_docs = []
    for document in matching_documents:
        query2 = {"source_node": document['target_node'], "relation": "PA"}
        matching_documents1 = collection.find(query2)
        for document1 in matching_documents1:
            if document1['target_node']==author2_id:
                list_docs.append(document['target_node'])

    if len(list_docs)!=0:
        g = nx.Graph()
        author1_name = author_nlist[int(author1_id.split('_')[1])]
        author2_name = author_nlist[int(author2_id.split('_')[1])]

        print("authors name:", author1_name, author2_name)
        g.add_node(author1_name[0], type="Author")
        g.add_node(author2_name[0], type="Author")
        for p in list_docs:
            g.add_node(p, type="Paper")
            g.add_edge(author1_name[0],p,relation="PA")
            g.add_edge(author2_name[0],p,relation='PA')


        aqua_rgb = (0, 255, 255)
        green_rgb = (102, 204, 0)
        light_blue_rgb = (173, 216, 230)

        # Mapping of node types to their corresponding colors
        color_map = {
            'Author': f'#{aqua_rgb[0]:02x}{aqua_rgb[1]:02x}{aqua_rgb[2]:02x}',  # Aqua color for type1
            'Venue': f'#{green_rgb[0]:02x}{green_rgb[1]:02x}{green_rgb[2]:02x}',  # Green color for type2
            'Paper': f'#{light_blue_rgb[0]:02x}{light_blue_rgb[1]:02x}{light_blue_rgb[2]:02x}',  # Light Blue color for type3
        }
        #color_map = {"Author":'aqua', "Venue":"green", "Paper":"blue"}
        shape_map = {"Author": "circle", "Venue": "triangle", "Paper": "square"}

        # Use the color mapping to get colors based on node types
        nt = Network('500px', '500px')
        for node, node_attrs in g.nodes(data=True):
            nt.add_node(node, color=color_map[node_attrs['type']],shape=shape_map[node_attrs['type']])

        for edge in g.edges(data=True):
            nt.add_edge(edge[0], edge[1], color="black")

        # nt.show_buttons(filter_=['physics'])

        with open('app/templates/graph.html', 'w') as file:
            file.write(nt.generate_html())
        return render_template("graph.html")
    return f"No co-authorship among the selected authors"

@main_bp.route('/author_search', methods=['GET', 'POST'])
def author_search():
    if request.method == 'POST':
        author_nlist = author_name_list()
        data = request.json
        # author_name = request.form['author_name']
        # author_id = f"Author_{request.form['author_id']}"
        author_name = data['author_name']
        author_id = f"Author_{data['author_id']}"
        if author_name:
            author_id = f"Author_{np.where(author_nlist== author_name)[0][0]}"
        a_list = author_list()
        print(len(a_list), a_list[0],author_id)
        if f"{author_id}" in a_list:
            query1 = {"source_node": f"{author_id}", "relation": "PA"}
            matching_documents1 = collection.find(query1)
            related_papers = [document['target_node'] for document in matching_documents1]
            related_venues =[]
            for paper in related_papers:
                query2 = {"source_node": f"{paper}", "relation": "PV"}
                matching_documents2 = collection.find(query2)
                for document in matching_documents2:
                    related_venues.append(document['target_node'])
            print(related_venues, related_papers)
            related_papers_at_venues = [f"{paper} @ {venue}" for paper, venue in zip(related_papers, related_venues)]
            print(related_papers_at_venues)

            author_name = author_nlist[int(author_id.split('_')[1])][0]
            G = nx.Graph()
            G.add_node(f"{author_name}", type="Author")
            for i,paper in enumerate(related_papers):
                G.add_node(paper, type="Paper")
                G.add_edge(f"{author_name}", paper, relation="PA")
                G.add_node(related_venues[i], type="Venue")
                G.add_edge(paper, related_venues[i], relation="PV")
            
            aqua_rgb = (0, 255, 255)
            green_rgb = (102, 204, 0)
            light_blue_rgb = (173, 216, 230)

            # Mapping of node types to their corresponding colors
            color_map = {
                'Author': f'#{aqua_rgb[0]:02x}{aqua_rgb[1]:02x}{aqua_rgb[2]:02x}',  # Aqua color for type1
                'Venue': f'#{green_rgb[0]:02x}{green_rgb[1]:02x}{green_rgb[2]:02x}',  # Green color for type2
                'Paper': f'#{light_blue_rgb[0]:02x}{light_blue_rgb[1]:02x}{light_blue_rgb[2]:02x}',  # Light Blue color for type3
            }
            #color_map = {"Author":'aqua', "Venue":"green", "Paper":"blue"}
            shape_map = {"Author": "circle", "Venue": "triangle", "Paper": "square"}

            nt = Network('768px', '1024px')

            for node, node_attrs in G.nodes(data=True):
                nt.add_node(node, color=color_map[node_attrs['type']],shape=shape_map[node_attrs['type']])

            for edge in G.edges(data=True):
                nt.add_edge(edge[0], edge[1], color="black")

            with open('app/templates/graph.html', 'w') as file:
                file.write(nt.generate_html())
            # return render_template("graph.html")
            print("graph generated")
            print(related_papers_at_venues)
            
        # return render_template('author_search.html', author_name=author_name, related_papers_venues=related_papers_at_venues)
        return jsonify({"author_name": author_name, "related_papers_venues": related_papers_at_venues})
    else:
        return render_template('author_search.html')


@main_bp.route('/venue_search', methods=['GET', 'POST'])
def venue_search():
    if request.method == 'POST':
        author_nlist = author_name_list() 
        author_name = request.form['author_name']
        v_list = venue_list()
        print(len(v_list), v_list[0],author_name)
        aqua_rgb = (0, 255, 255)
        green_rgb = (102, 204, 0)
        light_blue_rgb = (173, 216, 230)
        color_map = {
            'Author': f'#{aqua_rgb[0]:02x}{aqua_rgb[1]:02x}{aqua_rgb[2]:02x}',  # Aqua color for type1
            'Venue': f'#{green_rgb[0]:02x}{green_rgb[1]:02x}{green_rgb[2]:02x}',  # Green color for type2
            'Paper': f'#{light_blue_rgb[0]:02x}{light_blue_rgb[1]:02x}{light_blue_rgb[2]:02x}',  # Light Blue color for type3
        }
        shape_map = {"Author": "circle", "Venue": "triangle", "Paper": "square"}

        if f"Venue_{author_name}" in v_list:
            G = nx.Graph()
            G.add_node(f"Venue_{author_name}", type="Venue")
            query1 = {"source_node": f"Venue_{author_name}", "relation": "PV"}
            matching_documents1 = collection.find(query1)
            related_papers = []
            for document in matching_documents1:
                related_papers.append(document['target_node'])
                G.add_node(f"{document['target_node']}", type="Paper")
                G.add_edge(f"Venue_{author_name}",f"{document['target_node']}",relation='PV')
            related_venues =[]
            for paper in related_papers:
                query2 = {"source_node": f"{paper}", "relation": "PA"}
                matching_documents2 = collection.find(query2)
                for document in matching_documents2:
                    related_venues.append(document['target_node'])
                    author1_name = author_nlist[int(document['target_node'].split('_')[1])]
                    G.add_node(f"{author1_name[0]}", type="Author")
                    G.add_edge(f"Venue_{author_name}",f"{author1_name[0]}",relation='PV')    

            related_papers_at_venues = [f"{paper} @ {venue}" for paper, venue in zip(related_papers, related_venues)]
            # Use the color mapping to get colors based on node types
            nt = Network('768px', '1024px')

            for node, node_attrs in G.nodes(data=True):
                nt.add_node(node, color=color_map[node_attrs['type']],shape=shape_map[node_attrs['type']])

            for edge in G.edges(data=True):
                nt.add_edge(edge[0], edge[1], color="black")

            with open('app/templates/graph.html', 'w') as file:
                file.write(nt.generate_html())
            return render_template("graph.html")
        else:
            return render_template('venue_search.html', author_name=author_name, related_papers_at_venues=None)
    else:
        return render_template('venue_search.html')


@main_bp.route('/paper_search', methods=['GET', 'POST'])
def paper_search():
    if request.method == 'POST':
        author_name = request.form['author_name']
        p_list = paper_list()
        author_nlist = author_name_list() 

        print("Paper search",len(p_list), p_list[0],author_name)
        if f"Paper_{author_name}" in p_list:
            
            query1 = {"source_node": f"Paper_{author_name}", "relation": "PA"}
            matching_documents1 = collection.find(query1)
            related_authors = []
            print("query 1 executed")
            for document in matching_documents1:
                author1_name = author_nlist[int(document['target_node'].split('_')[1])]
                related_authors.append(author1_name[0])

            session['related_authors'] = related_authors
            query2 = {"source_node": f"Paper_{author_name}", "relation": "PV"}
            matching_documents2 = collection.find(query2)
            related_venue = []
            for document in matching_documents2:
                related_venue.append(document['target_node'])
            
            session['related_venue'] = related_venue
            session['author_name'] = f"Paper_{author_name}"
            print("queries executed")
        return render_template('paper_search.html', author_name=author_name, related_authors=related_authors, venue = related_venue)
    else:
        return render_template('paper_search.html')
    
@main_bp.route('/visualize_graph', methods=['POST'])
def visualize_graph():
    related_authors = session.get('related_authors', [])
    related_venue = session.get('related_venue', [])
    author_name = session.get('author_name', '')
    author_nlist = author_name_list()
    print(related_authors, related_venue, author_name)
    aqua_rgb = (0, 255, 255)
    green_rgb = (102, 204, 0)
    light_blue_rgb = (173, 216, 230)
    color_map = {
    'Author': f'#{aqua_rgb[0]:02x}{aqua_rgb[1]:02x}{aqua_rgb[2]:02x}',  # Aqua color for type1
    'Venue': f'#{green_rgb[0]:02x}{green_rgb[1]:02x}{green_rgb[2]:02x}',  # Green color for type2
    'Paper': f'#{light_blue_rgb[0]:02x}{light_blue_rgb[1]:02x}{light_blue_rgb[2]:02x}',  # Light Blue color for type3
    }
    #color_map = {"Author":'aqua', "Venue":"green", "Paper":"blue"}
    shape_map = {"Author": "circle", "Venue": "triangle", "Paper": "square"}

    G = nx.Graph()
    G.add_node(f"{author_name}", type="Paper")
    for auth in related_authors:
        G.add_node(auth, type="Author")
        G.add_edge(f"{author_name}",auth,relation='PA')

    for auth in related_venue:
        G.add_node(f"{auth}", type="Venue")
        G.add_edge(f"{author_name}",f"{auth}",relation='PV')

    # Use the color mapping to get colors based on node types
    nt = Network('768px', '1024px')

    for node, node_attrs in G.nodes(data=True):
        print(node_attrs)
        nt.add_node(node, color=color_map[node_attrs['type']],shape=shape_map[node_attrs['type']])

    for edge in G.edges(data=True):
        nt.add_edge(edge[0], edge[1], color="black")

    with open('app/templates/graph.html', 'w') as file:
        file.write(nt.generate_html())
    return render_template("graph.html")


@main_bp.route('/view_graph')
def view_graph():
    return render_template('graph.html')
