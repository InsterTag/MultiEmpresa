document.addEventListener("DOMContentLoaded", () => {
    const productsContainer = document.getElementById("productsContainer");
    const searchInput = document.getElementById("searchInput");
    const minPrice = document.getElementById("minPrice");
    const maxPrice = document.getElementById("maxPrice");
    const ratingInputs = document.querySelectorAll("#ratingFilter input[name='rating']");
    const subcategoryInputs = document.querySelectorAll(".subcategory-filter");
    const sortSelect = document.getElementById("sortSelect");
    const clearFiltersBtn = document.getElementById("clearFilters");

    // 🔹 Guardar todos los productos iniciales
    const allProducts = Array.from(productsContainer.querySelectorAll(".product-card"));

    /**
     * Función principal para aplicar filtros
     */
    function applyFilters() {
        let search = searchInput.value.toLowerCase().trim();
        let min = parseFloat(minPrice.value) || 0;
        let max = parseFloat(maxPrice.value) || Infinity;

        // Rating seleccionado
        let rating = [...ratingInputs].find(r => r.checked)?.value || 0;

        // Subcategorías seleccionadas
        let selectedSubcats = [...subcategoryInputs]
            .filter(cb => cb.checked)
            .map(cb => ({ subcategory: cb.dataset.subcategory, value: cb.dataset.value }));

        // Recorremos productos
        allProducts.forEach(product => {
            let name = product.dataset.name.toLowerCase();
            let price = parseFloat(product.dataset.price);
            let productRating = parseFloat(product.dataset.rating);
            let productSubcats = JSON.parse(product.dataset.subcategories || "{}");

            let matchesSearch = search === "" || name.includes(search);
            let matchesPrice = price >= min && price <= max;
            let matchesRating = rating == 0 || productRating >= rating;

            // Validar subcategorías
            let matchesSubcats = selectedSubcats.every(f =>
                productSubcats[f.subcategory] == f.value
            );

            // Mostrar u ocultar producto
            if (matchesSearch && matchesPrice && matchesRating && matchesSubcats) {
                product.classList.remove("hidden");
            } else {
                product.classList.add("hidden");
            }
        });

        applySorting();
    }

    /**
     * Ordenamiento de productos
     */
    function applySorting() {
        let sortValue = sortSelect.value;
        let visibleProducts = allProducts.filter(p => !p.classList.contains("hidden"));

        visibleProducts.sort((a, b) => {
            let aName = a.dataset.name.toLowerCase();
            let bName = b.dataset.name.toLowerCase();
            let aPrice = parseFloat(a.dataset.price);
            let bPrice = parseFloat(b.dataset.price);
            let aRating = parseFloat(a.dataset.rating);
            let bRating = parseFloat(b.dataset.rating);

            switch (sortValue) {
                case "name": return aName.localeCompare(bName);
                case "price-low": return aPrice - bPrice;
                case "price-high": return bPrice - aPrice;
                case "rating": return bRating - aRating;
                default: return 0;
            }
        });

        visibleProducts.forEach(p => productsContainer.appendChild(p));
    }

    /**
     * Limpiar todos los filtros
     */
    function clearFilters() {
        searchInput.value = "";
        minPrice.value = "";
        maxPrice.value = "";
        ratingInputs.forEach(r => r.checked = false);
        subcategoryInputs.forEach(cb => cb.checked = false);

        allProducts.forEach(p => p.classList.remove("hidden"));
        applySorting();
    }

    // 🔹 Eventos
    searchInput.addEventListener("input", applyFilters);
    minPrice.addEventListener("input", applyFilters);
    maxPrice.addEventListener("input", applyFilters);
    ratingInputs.forEach(r => r.addEventListener("change", applyFilters));
    subcategoryInputs.forEach(cb => cb.addEventListener("change", applyFilters));
    sortSelect.addEventListener("change", applySorting);
    clearFiltersBtn.addEventListener("click", clearFilters);

    // 🔹 Sidebar: abrir/cerrar categorías
    document.querySelectorAll(".category-btn").forEach(btn => {
        btn.addEventListener("click", e => {
            e.preventDefault();
            const subcatContainer = btn.nextElementSibling;
            const arrow = btn.querySelector(".category-arrow");

            subcatContainer.classList.toggle("hidden");
            arrow.classList.toggle("rotate-90");
        });
    });
});
