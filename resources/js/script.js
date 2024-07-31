document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("product-form");
    const tableBody = document.querySelector("#report-table tbody");
    const searchInput = document.getElementById("search");
    const downloadButton = document.getElementById("download-report");

    const products = [];
    let editIndex = -1;

    form.addEventListener("submit", (event) => {
        event.preventDefault();

        const name = document.getElementById("name").value;
        const description = document.getElementById("description").value;
        const quantity = parseInt(document.getElementById("quantity").value);
        const date = new Date().toLocaleString();
        const id = editIndex >= 0 ? products[editIndex].id : products.length + 1;
        const status = quantity === 0 ? "Inexistente" : "Existente";

        const product = { id, name, description, quantity, date, status };

        if (editIndex >= 0) {
            products[editIndex] = product;
            updateProductInTable(editIndex, product);
            editIndex = -1;
        } else {
            products.push(product);
            addProductToTable(product);
        }

        form.reset(); // Limpia los campos de entrada
        searchInput.dispatchEvent(new Event('input')); // Actualiza la tabla filtrada si hay una búsqueda activa
    });

    searchInput.addEventListener("input", (event) => {
        const searchValue = event.target.value.toLowerCase();
        tableBody.innerHTML = "";

        const filteredProducts = products.filter(product => 
            product.name.toLowerCase().includes(searchValue) ||
            product.description.toLowerCase().includes(searchValue)
        );

        filteredProducts.forEach(product => addProductToTable(product));
    });

    downloadButton.addEventListener("click", () => {
        const csvContent = generateCSV(products);
        const blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
        const url = URL.createObjectURL(blob);
        const link = document.createElement("a");
        link.setAttribute("href", url);
        link.setAttribute("download", "reporte_de_almacen.csv");
        link.style.visibility = "hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    function addProductToTable(product) {
        const row = document.createElement("tr");
        row.classList.add("fade-in-slide-down");

        row.innerHTML = `
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.quantity}</td>
            <td>${product.date}</td>
            <td>${product.status}</td>
            <td>
                <button class="deleteButton">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 50 59" class="bin">
                        <path fill="#B5BAC1" d="M0 7.5C0 5.01472 2.01472 3 4.5 3H45.5C47.9853 3 50 5.01472 50 7.5V7.5C50 8.32843 49.3284 9 48.5 9H1.5C0.671571 9 0 8.32843 0 7.5V7.5Z"></path>
                        <path fill="#B5BAC1" d="M17 3C17 1.34315 18.3431 0 20 0H29.3125C30.9694 0 32.3125 1.34315 32.3125 3V3H17V3Z"></path>
                        <path fill="#B5BAC1" d="M2.18565 18.0974C2.08466 15.821 3.903 13.9202 6.18172 13.9202H43.8189C46.0976 13.9202 47.916 15.821 47.815 18.0975L46.1699 55.1775C46.0751 57.3155 44.314 59.0002 42.1739 59.0002H7.8268C5.68661 59.0002 3.92559 57.3155 3.83073 55.1775L2.18565 18.0974ZM18.0003 49.5402C16.6196 49.5402 15.5003 48.4209 15.5003 47.0402V24.9602C15.5003 23.5795 16.6196 22.4602 18.0003 22.4602C19.381 22.4602 20.5003 23.5795 20.5003 24.9602V47.0402C20.5003 48.4209 19.381 49.5402 18.0003 49.5402ZM29.5003 47.0402C29.5003 48.4209 30.6196 49.5402 32.0003 49.5402C33.381 49.5402 34.5003 48.4209 34.5003 47.0402V24.9602C34.5003 23.5795 33.381 22.4602 32.0003 22.4602C30.6196 22.4602 29.5003 23.5795 29.5003 24.9602V47.0402Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        <path fill="#B5BAC1" d="M2 13H48L47.6742 21.28H2.32031L2 13Z"></path>
                    </svg>
                    <span class="tooltip">Delete</span>
                </button>
            </td>
        `;

        row.querySelector(".deleteButton").addEventListener("click", (e) => {
            e.stopPropagation(); // Previene la propagación del evento para evitar que se dispare el evento de click de la fila
            const index = products.indexOf(product);
            products.splice(index, 1);
            row.remove();
            searchInput.dispatchEvent(new Event('input')); // Actualiza la tabla filtrada si hay una búsqueda activa
        });

        row.addEventListener("click", () => {
            editIndex = products.indexOf(product);
            document.getElementById("product-id").value = product.id;
            document.getElementById("name").value = product.name;
            document.getElementById("description").value = product.description;
            document.getElementById("quantity").value = product.quantity;
        });

        tableBody.appendChild(row);
    }

    function updateProductInTable(index, product) {
        const rows = tableBody.getElementsByTagName("tr");

        if (rows[index]) {
            const row = rows[index];
            row.innerHTML = `
                <td>${product.id}</td>
                <td>${product.name}</td>
                <td>${product.description}</td>
                <td>${product.quantity}</td>
                <td>${product.date}</td>
                <td>${product.status}</td>
                <td>
                    <button class="deleteButton">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 50 59" class="bin">
                            <path fill="#B5BAC1" d="M0 7.5C0 5.01472 2.01472 3 4.5 3H45.5C47.9853 3 50 5.01472 50 7.5V7.5C50 8.32843 49.3284 9 48.5 9H1.5C0.671571 9 0 8.32843 0 7.5V7.5Z"></path>
                            <path fill="#B5BAC1" d="M17 3C17 1.34315 18.3431 0 20 0H29.3125C30.9694 0 32.3125 1.34315 32.3125 3V3H17V3Z"></path>
                            <path fill="#B5BAC1" d="M2.18565 18.0974C2.08466 15.821 3.903 13.9202 6.18172 13.9202H43.8189C46.0976 13.9202 47.916 15.821 47.815 18.0975L46.1699 55.1775C46.0751 57.3155 44.314 59.0002 42.1739 59.0002H7.8268C5.68661 59.0002 3.92559 57.3155 3.83073 55.1775L2.18565 18.0974ZM18.0003 49.5402C16.6196 49.5402 15.5003 48.4209 15.5003 47.0402V24.9602C15.5003 23.5795 16.6196 22.4602 18.0003 22.4602C19.381 22.4602 20.5003 23.5795 20.5003 24.9602V47.0402C20.5003 48.4209 19.381 49.5402 18.0003 49.5402ZM29.5003 47.0402C29.5003 48.4209 30.6196 49.5402 32.0003 49.5402C33.381 49.5402 34.5003 48.4209 34.5003 47.0402V24.9602C34.5003 23.5795 33.381 22.4602 32.0003 22.4602C30.6196 22.4602 29.5003 23.5795 29.5003 24.9602V47.0402Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                            <path fill="#B5BAC1" d="M2 13H48L47.6742 21.28H2.32031L2 13Z"></path>
                        </svg>
                        <span class="tooltip">Delete</span>
                    </button>
                </td>
            `;

            row.querySelector(".deleteButton").addEventListener("click", (e) => {
                e.stopPropagation(); // Previene la propagación del evento para evitar que se dispare el evento de click de la fila
                products.splice(index, 1);
                row.remove();
                searchInput.dispatchEvent(new Event('input')); // Actualiza la tabla filtrada si hay una búsqueda activa
            });

            row.addEventListener("click", () => {
                editIndex = products.indexOf(product);
                document.getElementById("product-id").value = product.id;
                document.getElementById("name").value = product.name;
                document.getElementById("description").value = product.description;
                document.getElementById("quantity").value = product.quantity;
            });
        }

        searchInput.dispatchEvent(new Event('input')); // Actualiza la tabla filtrada si hay una búsqueda activa
    }

    function generateCSV(products) {
        const headers = ["ID", "Nombre", "Descripción", "Cantidad", "Fecha y hora", "Status"];
        const rows = products.map(product => [
            product.id,
            product.name,
            product.description,
            product.quantity,
            product.date,
            product.status
        ]);

        const csvContent = [headers, ...rows]
            .map(row => row.join(","))
            .join("\n");

        return csvContent;
    }
});
