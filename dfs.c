#include <stdio.h>

int graph[10][10];
int visited[10];
int n;

// Function for DFS traversal
void DFS(int node)
{
    int i;

    // Print current node
    printf("%d ", node);

    // Mark node as visited
    visited[node] = 1;

    // Visit all adjacent unvisited nodes
    for(i = 0; i < n; i++)
    {
        if(graph[node][i] == 1 && visited[i] == 0)
        {
            DFS(i);
        }
    }
}

int main()
{
    int i, j, start;

    // Input number of vertices
    printf("Enter number of vertices: ");
    scanf("%d", &n);

    // Input adjacency matrix
    printf("Enter adjacency matrix:\n");

    for(i = 0; i < n; i++)
    {
        for(j = 0; j < n; j++)
        {
            scanf("%d", &graph[i][j]);
        }
    }

    // Input starting vertex
    printf("Enter starting vertex: ");
    scanf("%d", &start);

    printf("DFS Traversal: ");

    // Call DFS function
    DFS(start);

    return 0;
}