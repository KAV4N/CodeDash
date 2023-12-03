
const leaderboardData = [
  { rank: 1, player: 'John Doe', score: 1000 },
  { rank: 2, player: 'Jane Doe', score: 950 },
  { rank: 3, player: 'Alice', score: 900 },
  { rank: 4, player: 'Bob', score: 850 },
  { rank: 5, player: 'Charlie', score: 800 },
  { rank: 6, player: 'David', score: 750 },
  { rank: 7, player: 'David', score: 750 },
  { rank: 8, player: 'David', score: 750 },
    { rank: 9, player: 'David', score: 750 },
    { rank: 10, player: 'David', score: 750 },
    { rank: 11, player: 'David', score: 750 },
    { rank: 12, player: 'David', score: 750 },
];

const pageSize = 7;

function displayPage(pageNumber) {
  const startIndex = (pageNumber - 1) * pageSize;
  const endIndex = startIndex + pageSize;
  const pageData = leaderboardData.slice(startIndex, endIndex);

  const leaderboardBody = document.getElementById('leaderboardBody');
  leaderboardBody.innerHTML = '';

  pageData.forEach((entry) => {
    const row = `<tr>
                  <th scope="row">${entry.rank}</th>
                  <td>${entry.player}</td>
                  <td>${entry.score}</td>
                </tr>`;
    leaderboardBody.innerHTML += row;
  });
}

document.getElementById('pagination').addEventListener('click', (event) => {
  const action = event.target.getAttribute('aria-label');
  if (action) {
    handlePaginationClick(action.toLowerCase());
  }
});

function handlePaginationClick(action) {
  const totalPages = Math.ceil(leaderboardData.length / pageSize);
  let currentPage = 1;

  switch (action) {
    case 'first':
      currentPage = 1;
      break;
    case 'previous':
      currentPage = Math.max(currentPage - 1, 1);
      break;
    case 'next':
      currentPage = Math.min(currentPage + 1, totalPages);
      break;
    case 'last':
      currentPage = totalPages;
      break;
  }

  displayPage(currentPage);
}

displayPage(1);