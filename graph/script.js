const nodes = 10;
const graph = {
    0: [1, 2],
    1: [3, 4],
    2: [5],
    3: [],
    4: [6],
    5: [7],
    6: [],
    7: [8, 9],
    8: [],
    9: []
};

const gridContainer = document.getElementById('grid-container');

// Create grid nodes
function createGrid() {
    for (let i = 0; i < nodes; i++) {
        const div = document.createElement('div');
        div.classList.add('node');
        div.id = `node-${i}`;
        div.innerText = i;
        gridContainer.appendChild(div);
    }
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function bfs(start) {
    const visited = new Array(nodes).fill(false);
    const queue = [start];
    visited[start] = true;

    while (queue.length > 0) {
        const current = queue.shift();
        visitNode(current);
        await sleep(500);

        for (let neighbor of graph[current]) {
            if (!visited[neighbor]) {
                queue.push(neighbor);
                visited[neighbor] = true;
            }
        }
    }
}

async function dfs(start, visited = new Array(nodes).fill(false)) {
    visited[start] = true;
    visitNode(start);
    await sleep(500);

    for (let neighbor of graph[start]) {
        if (!visited[neighbor]) {
            await dfs(neighbor, visited);
        }
    }
}

function visitNode(index) {
    const node = document.getElementById(`node-${index}`);
    node.classList.add('visited');
}

function resetGrid() {
    const nodeElements = document.querySelectorAll('.node');
    nodeElements.forEach(node => node.classList.remove('visited'));
}

function startBFS() {
    resetGrid();
    bfs(0);
}

function startDFS() {
    resetGrid();
    dfs(0);
}

createGrid();
