from scipy.io import loadmat
import numpy as np
# import json
# import networkx as nx

def author_list():
    arr = loadmat(r"C:\Users\akhil\Downloads\akhil_webui 4\akhil_webui\ACM.mat")
    PA = arr['PvsA'].todense()
    PV = arr['PvsV'].todense()
    al = []
    # PAr, PAc = PA.shape
    # PVr ,PVc = PV.shape
    # AV = np.zeros((PAc,PVc))
    # for i in range(PA.shape[1]):
    #     for j in np.where(PA[:,i])[0]:
    #         for k in np.where(PV[j,:])[1]:
    #             AV[j,k] = 1
    for author_id in range(PA.shape[1]):
        al.append(f'Author_{author_id}')
    return al

def author_name_list():
    arr = loadmat(r"C:\Users\akhil\Downloads\akhil_webui 4\akhil_webui\ACM.mat")
    A = arr['A']
    a = A.flatten()
    print(a[0],a[14555])
    # print(np.where(a=='Lili Qiuy')[0][0])
    #print(type(A), A.shape, A.flatten()[44][0])
    #PV = arr['PvsV'].todense()
    #al = []
    # PAr, PAc = PA.shape
    # PVr ,PVc = PV.shape
    # AV = np.zeros((PAc,PVc))
    # for i in range(PA.shape[1]):
    #     for j in np.where(PA[:,i])[0]:
    #         for k in np.where(PV[j,:])[1]:
    #             AV[j,k] = 1
    # for author_id in range(PA.shape[1]):
    #     al.append(f'Author_{author_id}')
    return A.flatten()

def venue_list():
    arr = loadmat(r"C:\Users\akhil\Downloads\akhil_webui 4\akhil_webui\ACM.mat")
    PA = arr['PvsA'].todense()
    PV = arr['PvsV'].todense()
    al = []
    # PAr, PAc = PA.shape
    # PVr ,PVc = PV.shape
    # AV = np.zeros((PAc,PVc))
    # for i in range(PA.shape[1]):
    #     for j in np.where(PA[:,i])[0]:
    #         for k in np.where(PV[j,:])[1]:
    #             AV[j,k] = 1
    for venue_id in range(PV.shape[1]):
        al.append(f'Venue_{venue_id}')
    return al

def paper_list():
    arr = loadmat(r"C:\Users\akhil\Downloads\akhil_webui 4\akhil_webui\ACM.mat")
    PA = arr['PvsA'].todense()
    PV = arr['PvsV'].todense()
    al = []
    # PAr, PAc = PA.shape
    # PVr ,PVc = PV.shape
    # AV = np.zeros((PAc,PVc))
    # for i in range(PA.shape[1]):
    #     for j in np.where(PA[:,i])[0]:
    #         for k in np.where(PV[j,:])[1]:
    #             AV[j,k] = 1
    for venue_id in range(PV.shape[0]):
        al.append(f'Paper_{venue_id}')
    return al


if __name__=="__main__":
    x = author_name_list()
    print(x[1])

"""
json_data = {}

# Create a list to hold authors
authors = []

# Create a list to hold papers
papers = []

# Create a list to hold venues
venues = []
count=0
# Iterate through the authors vs. papers adjacency matrix
for author_index, author_row in enumerate(PA.T):
  author_name = f"Author {author_index + 1}"
  author = {
      "name": author_name,
      "papers": []
  }
  # Iterate through papers associated with the author
  for paper_index, paper_has_relation in enumerate(np.array(author_row)[0]):
      if paper_has_relation:
          paper_name = f"Paper {paper_index + 1}"
          author["papers"].append(paper_name)
          papers.append({
              "name": paper_name,
              "venue": f"Venue {np.where(np.array(PV[paper_index]).squeeze())[0][0]}"
          })

  authors.append(author)


hetero_graph = nx.Graph()

for author_id in range(AV.shape[0]):
    hetero_graph.add_node(f'Author_{author_id}', type='Author')

for venue in range(AV.shape[1]):
    hetero_graph.add_node(f'Venue_{venue}', type='Venue')

for paper in range(PV.shape[0]):
    hetero_graph.add_node(f'Paper_{paper}', type='Paper')


author = [node for node, data in hetero_graph.nodes(data=True) if data['type'] == 'Author']
venue = [node for node, data in hetero_graph.nodes(data=True) if data['type'] == 'Venue']
paper = [node for node, data in hetero_graph.nodes(data=True) if data['type'] == 'Paper']

"""