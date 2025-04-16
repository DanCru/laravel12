// Sidebar Toggle
const sidebar = document.querySelector('.sidebar');
const mainContent = document.querySelector('.main-content');
const toggleBtn = document.querySelector('.sidebar__toggle');

toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('sidebar--collapsed');
        mainContent.classList.toggle('main-content--expanded');
});

// Sidebar Link Active State
// const sidebarLinks = document.querySelectorAll('.sidebar__link');
// sidebarLinks.forEach(link => {
//         link.addEventListener('click', (e) => {
//                 // e.preventDefault();
//                 sidebarLinks.forEach(l => l.classList.remove('sidebar__link--active'));
//                 link.classList.add('sidebar__link--active');
//         });
// });

// CRUD Operations
const modal = document.getElementById('productModal');
const productForm = document.getElementById('productForm');
const addProductBtn = document.getElementById('addProductBtn');
const closeModalBtn = document.getElementById('closeModal');
let editMode = false;
let editId = null;

// Open Modal for Adding
addProductBtn.addEventListener('click', () => {
        editMode = false;
        productForm.reset();
        modal.classList.add('modal--active');
});

// Close Modal
closeModalBtn.addEventListener('click', () => {
        modal.classList.remove('modal--active');
});

// Handle Form Submission
productForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const name = document.getElementById('productName').value;
        const price = document.getElementById('productPrice').value;
        const stock = document.getElementById('productStock').value;

        if (editMode) {
                // Update existing product
                const row = document.querySelector(`.product-table__row[data-id="${editId}"]`);
                row.children[1].textContent = name;
                row.children[2].textContent = `$${price}`;
                row.children[3].textContent = stock;
        } else {
                // Add new product
                const id = document.querySelectorAll('.product-table__row').length + 1;
                const newRow = document.createElement('div');
                newRow.className = 'product-table__row';
                newRow.dataset.id = id;
                newRow.innerHTML = `
            <div>${id}</div>
            <div>${name}</div>
            <div>$${price}</div>
            <div>${stock}</div>
            <div class="product-table__actions">
                <button class="button button--primary edit-btn">Edit</button>
                <button class="button button--danger delete-btn">Delete</button>
            </div>
        `;
                document.querySelector('.product-table').appendChild(newRow);
                attachEventListeners(newRow);
        }

        modal.classList.remove('modal--active');
});

// Edit and Delete Functionality
function attachEventListeners(row) {
        const editBtn = row.querySelector('.edit-btn');
        const deleteBtn = row.querySelector('.delete-btn');

        editBtn.addEventListener('click', () => {
                editMode = true;
                editId = row.dataset.id;
                document.getElementById('productName').value = row.children[1].textContent;
                document.getElementById('productPrice').value = row.children[2].textContent.slice(1);
                document.getElementById('productStock').value = row.children[3].textContent;
                modal.classList.add('modal--active');
        });

        deleteBtn.addEventListener('click', () => {
                if (confirm('Are you sure you want to delete this product?')) {
                        row.remove();
                }
        });
}

// Attach event listeners to existing rows
document.querySelectorAll('.product-table__row').forEach(attachEventListeners);