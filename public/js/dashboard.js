function sortTable(column, direction) {
    const table = document.getElementById("transactionsTable");
    const rows = Array.from(table.rows);

    const columnIndex = {
        'created_at': 0,
        'account': 1,
        'transaction_type': 2,
        'description': 3,
        'amount': 4
    }[column];

    rows.sort((a, b) => {
        const cellA = a.cells[columnIndex].innerText;
        const cellB = b.cells[columnIndex].innerText;

        if (column === 'amount') {
            const amountA = parseFloat(cellA.replace(/,/g, ''));
            const amountB = parseFloat(cellB.replace(/,/g, ''));
            return direction === 'asc' ? amountA - amountB : amountB - amountA;
        } else if (column === 'created_at') {
            return direction === 'asc' ? new Date(cellA) - new Date(cellB) : new Date(cellB) - new Date(cellA);
        } else {
            return direction === 'asc' ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
        }
    });

    rows.forEach(row => table.appendChild(row));

    document.getElementById("transactionsTable").setAttribute("data-sort-dir", direction);
    updateSortArrows(column, direction);
}

function toggleSortDirection(column) {
    const currentDirection = document.getElementById("transactionsTable").getAttribute("data-sort-dir");
    return currentDirection === "asc" ? "desc" : "asc";
}

function updateSortArrows(column, direction) {
    const arrows = document.querySelectorAll(".sort-arrow");
    arrows.forEach((arrow) => (arrow.innerHTML = "&#9650;&#9660;")); // Reset all arrows to up and down

    const arrow = document.getElementById(column + "_arrow");
    if (direction === "asc") {
        arrow.innerHTML = "&#9650;"; // Up arrow
    } else {
        arrow.innerHTML = "&#9660;"; // Down arrow
    }
}

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("transactionsTable").setAttribute("data-sort-dir", "desc");
    sortTable('created_at', 'desc');
});

function adjustDate(id, months) {
    const input = document.getElementById(id);
    let date = new Date(input.value);
    date.setMonth(date.getMonth() + months);

    const today = new Date();
    if (date > today) {
        date = today;
    }

    input.value = date.toISOString().split('T')[0] + 'T' + date.toTimeString().split(' ')[0];
    validateDates();
}

function validateDates() {
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');

    const startDate = new Date(startDateInput.value);
    const endDate = new Date(endDateInput.value);

    if (endDate < startDate) {
        endDateInput.value = startDateInput.value;
    }
}