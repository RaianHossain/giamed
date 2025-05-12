@extends('layouts.clientLayout')
@section('title', 'Products')
@section('content')
    @include('client.partials.inner-hero', ['title' => 'Products', 'subtitle' => 'Our Products', 'breadCrumb' => 'Products'])

    <style>
        body {
            overflow-x: hidden;
        }
        /* Consistent styling for all select inputs */
        .select-inputs {
            width: 150px !important;
            padding-top: 0px !important;
        }
        
        /* Ensures 3px gap after each input */
        .form-control {
            margin-bottom: 10px !important;
        }

        /* @media (min-width: 1095px) {
            #filter-cbtn {
                display: none;
            }
        }
        @media (max-width: 767px) {
            #filter-cbtn {
                display: block;
            }
        }
        @media (max-width: 992px) {
            #filter-cbtn {
                display: block;
            }
        } */
         /* Default styles (desktop) */
        /* Filter Toggle Button Styles */
        /* Filter Sidebar Styles */
        /* Filter Sidebar Styles */
        .cbtn {
            border: none;
            padding: 3px 6px;
        }
        
        .filter-sidebar {
            transition: all 0.3s ease;
        }

        /* Mobile Filter Styles */
        @media (max-width: 1199.98px) {
            .filter-sidebar {
            position: fixed;
            top: 0;
            left: -100%;
            width: 80%;
            max-width: 300px;
            height: 100vh;
            background: white;
            z-index: 1050;
            padding: 20px;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            display: none;
            }

            .filter-sidebar.active {
            left: 0;
            display: block !important;
            }

            /* Overlay when filter is open */
            .filter-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            display: none;
            }

            .filter-overlay.active {
            display: block;
            }
        }

        /* Filter Toggle Button */
        .filter-toggle-cbtn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            color: #333;
            border: 1px solid #ddd;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .filter-toggle-cbtn:hover {
            background: #e9ecef;
        }

        /* Close Button for Mobile Filter */
        .filter-close-cbtn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5rem;
            background: none;
            border: none;
            color: #666;
        }

        @media (min-width: 1200px) {
            .filter-close-cbtn {
                display: none !important;
            }
        }

        @media (min-width: 1200px) {
            .filter-sidebar {
                border-right: 1px solid #ddd;
            }
        }

        @media (max-width: 767.98px) {
            .filter-sidebar .row.mt-3 {
                flex-direction: column;
            }

            .filter-sidebar .col-6 {
                width: 100%;
                margin-bottom: 10px;
            }
        }

        @media (min-width: 1200px) {
            .filter-sidebar {
                display: block !important;
                position: relative;
                left: 0;
                height: auto;
                width: 100%;
                max-width: none;
            }
        }


    </style>

    
    <!-- shop-banner-area start -->
    <section class="shop-banner-area pt-40 pb-120">
        <div class="row">
          <!-- Filter Sidebar -->
          <div class="col-xl-2 filter-sidebar d-xl-block d-none">
            <div class="container">
              <!-- Filter form content -->
              <div class="form-group">
                <input type="text" style="width: 150px;" id="name" class="form-control" placeholder="Name">
              </div>
      
              <div class="form-group">
                <select id="category" class="form-control select-inputs">
                  <option value="">Category</option>
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
      
              <div class="form-group">
                <select id="subCategories" class="form-control select-inputs">
                  <option value="">Sub Category</option>
                  @foreach ($subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}">{{ $subCategory->title }}</option>
                  @endforeach
                </select>
              </div>
      
              <div class="form-group">
                <select id="brands" class="form-control select-inputs">
                  <option value="">Brand</option>
                  @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                  @endforeach
                </select>
              </div>
      
              <div class="row mt-3">
                <div class="col-6">
                  <button id="filterBtn" class="cbtn text-white" style="background-color: #0fbf97;">Filter</button>
                </div>
                <div class="col-6">
                  <button id="resetBtn" class="cbtn text-white" style="background-color: #8fb569;">Reset</button>
                </div>
              </div>
            </div>
          </div>
      
          <!-- Main Content Area -->
          <div class="col-xl-10 col-12">
            <div class="container">
              <!-- Header Row -->
              <div class="row align-items-center mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                  <div class="product-showing">
                    <p id="showing-results" class="mb-0">Loading products...</p>
                  </div>
                  <div class="shop-tab d-flex align-items-center">
                    <ul class="nav" id="myTab" role="tablist">
                      <!-- Filter Toggle Button (Visible on mobile/tablet) -->
                      <li class="nav-item d-xl-none">
                        <a class="nav-link filter-toggle-cbtn" id="filter-tab" role="button">
                          <i class="fas fa-filter"></i>
                        </a>
                      </li>
                      <!-- Grid/List View Buttons -->
                      <li class="nav-item d-none d-md-inline-block">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                          aria-controls="home" aria-selected="true"><i class="fas fa-th-large"></i></a>
                      </li>
                      <li class="nav-item d-none d-md-inline-block">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                          aria-controls="profile" aria-selected="false"><i class="fas fa-list-ul"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
      
              <!-- Products Container -->
              <div class="row">
                <div class="col-12">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row" id="products-grid-container">
                        <!-- Products will be loaded here via JavaScript -->
                      </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div id="products-list-container">
                        <!-- Products will be loaded here via JavaScript -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
      
              <!-- Pagination -->
              <div class="row">
                <div class="col-12">
                  <div class="basic-pagination basic-pagination-2 text-center mt-20">
                    <ul id="pagination-links">
                      <!-- Pagination will be loaded here via JavaScript -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
        <!-- Overlay for Mobile Filter Sidebar -->
        <div class="filter-overlay"></div>

        <!-- Product Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- shop-banner-area end -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const appUrl = '{{ config('app.url') }}';
            let currentPage = 1;
            
            // Event listeners
            document.getElementById('filterBtn').addEventListener('click', function() {
                const name = document.getElementById('name').value;
                const category = document.getElementById('category').value;
                const subCategory = document.getElementById('subCategories').value;
                const brand = document.getElementById('brands').value;
                
                // Initialize an empty object
                const filterObject = {};
                
                // Only add properties if they are not empty
                if (name.length > 0) filterObject.name = name;
                if (category.length > 0) filterObject.category = category;
                if (subCategory.length > 0) filterObject.subCategory = subCategory;
                if (brand.length > 0) filterObject.brand = brand;
                
                console.log('Filters:', filterObject);
                
                // Now you can use filterObject in fetchProducts()
                fetchProducts(currentPage, filterObject);
            });
            document.getElementById('resetBtn').addEventListener('click', function() {
                // Reset filters
                document.getElementById('name').value = '';
                document.getElementById('category').value = '';
                document.getElementById('subCategories').value = '';
                document.getElementById('brands').value = '';
                
                // Fetch products without filters
                fetchProducts(currentPage);
            });
            
            // Fetch products on page load
            fetchProducts(currentPage);
            
            // Function to fetch products
            function fetchProducts(page, filters = {}) {
                // Construct the base URL with pagination
                const baseUrl = `/api/shop?page=${page}`;
                
                // Initialize URLSearchParams for filters (if any)
                const filterParams = new URLSearchParams();
                
                // Append non-empty filters to URLSearchParams
                for (const [key, value] of Object.entries(filters)) {
                    if (value && value.trim() !== '') {  // Only add if value is not empty
                        filterParams.append(key, value);
                    }
                }
                
                // Build the final URL
                const url = filterParams.toString() 
                    ? `${baseUrl}&${filterParams.toString()}`  // If filters exist, append them
                    : baseUrl;  // Otherwise, just use base URL
                
                console.log('Fetching URL:', url);  // For debugging
                
                // Fetch the data
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        console.log('Products data:', data);
                        updateProductDisplay(data);
                        updatePagination(data.pagination);
                        updateShowingText(data.pagination);
                    })
                    .catch(error => {
                        console.error('Error fetching products:', error);
                        document.getElementById('showing-results').textContent = 'Error loading products';
                    });
            }
            
            // Update product display
            function updateProductDisplay(data) {
                const gridContainer = document.getElementById('products-grid-container');
                const listContainer = document.getElementById('products-list-container');

                gridContainer.innerHTML = '';
                listContainer.innerHTML = '';

                data.data.forEach(product => {
                    const imagePath = product.avatar 
                        ? `${window.location.origin}/storage/${product.avatar}`
                        : `${window.location.origin}/img/shop/default.jpg`;

                    const productData = encodeURIComponent(JSON.stringify(product));

                    // === Grid View ===
                    const gridCol = document.createElement('div');
                    gridCol.className = "col-lg-4 col-md-6";
                    gridCol.innerHTML = `
                        <div class="product mb-40 open-product-modal" data-product="${productData}" style="cursor: pointer;">
                            <div class="product__img">
                                <img src="${imagePath}" alt="${product.title}" class="img-fluid">
                                <div class="product-action text-center">
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                    <a href="#"><i class="fas fa-heart"></i></a>
                                    <a href="#"><i class="fas fa-expand"></i></a>
                                </div>
                            </div>
                            <div class="product__content text-center pt-30">
                                <span class="pro-cat"><a href="#">${product.category?.title || 'Uncategorized'}</a></span>
                                <h4 class="pro-title">${product.title}</h4>
                                
                            </div>
                        </div>
                    `;
                    gridContainer.appendChild(gridCol);

                    // === List View ===
                    const listRow = document.createElement('div');
                    listRow.className = "row mb-30 open-product-modal";
                    listRow.dataset.product = productData;
                    listRow.style.cursor = "pointer";

                    listRow.innerHTML = `
                        <div class="col-lg-4 col-md-6">
                            <div class="product">
                                <div class="product__img">
                                    <img src="${imagePath}" alt="${product.title}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="product-list-content pt-10">
                                <div class="product__content mb-20">
                                    <span class="pro-cat">${product.category?.title || 'Uncategorized'}</span>
                                    <h4 class="pro-title">${product.title}</h4>
                                    
                                </div>
                                <p>${product.description || 'No description available.'}</p>
                                <div class="product-action-list">
                                    <a class="btn btn-theme" href="#">add to cart</a>
                                    <a class="action-btn" href="#"><i class="fas fa-heart"></i></a>
                                    <a class="action-btn" href="#"><i class="fas fa-expand"></i></a>
                                </div>
                            </div>
                        </div>
                    `;
                    listContainer.appendChild(listRow);
                });
            }

            
            // Update pagination links
            function updatePagination(pagination) {
                const paginationContainer = document.getElementById('pagination-links');
                paginationContainer.innerHTML = '';
                
                // Previous button
                if (pagination.current_page > 1) {
                    paginationContainer.innerHTML += `
                        <li><a href="#" onclick="event.preventDefault(); fetchProducts(${pagination.current_page - 1})"><i class="fas fa-angle-double-left"></i></a></li>
                    `;
                }
                
                // Page numbers
                for (let i = 1; i <= pagination.last_page; i++) {
                    paginationContainer.innerHTML += `
                        <li class="${i === pagination.current_page ? 'active' : ''}">
                            <a href="#" onclick="event.preventDefault(); fetchProducts(${i})">${i}</a>
                        </li>
                    `;
                }
                
                // Next button
                if (pagination.has_more_pages) {
                    paginationContainer.innerHTML += `
                        <li><a href="#" onclick="event.preventDefault(); fetchProducts(${pagination.current_page + 1})"><i class="fas fa-angle-double-right"></i></a></li>
                    `;
                }
            }
            
            // Update showing text
            function updateShowingText(pagination) {
                const showingText = `Showing ${pagination.from}-${pagination.to} of ${pagination.total} results`;
                document.getElementById('showing-results').textContent = showingText;
            }
            
            // Make fetchProducts available globally for pagination clicks
            window.fetchProducts = fetchProducts;    
            
            document.addEventListener("click", function (e) {
                const target = e.target.closest(".open-product-modal");
                if (!target) return;

                const product = JSON.parse(decodeURIComponent(target.dataset.product));

                console.log("Clicked element:", target);
                console.log("Data-product raw:", target.dataset.product);

                // Set modal title
                document.getElementById("productModalLabel").textContent = product.title;

                // Set modal body
                const modalBody = document.querySelector("#productModal .modal-body");
                modalBody.innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <img src="${window.location.origin}/storage/${product.avatar || 'img/shop/default.jpg'}" alt="${product.title}" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h5>${product.title}</h5>
                            <p>${product.description || 'No description available.'}</p>                            
                            ${Array.isArray(product.tags) && product.tags.length 
                                ? `<p><strong>Tags:</strong> ${product.tags.join(', ')}</p>` 
                                : ''}
                            <p><strong>Category:</strong> ${product.category?.title || 'Uncategorized'}</p>
                            <p><strong>Brand:</strong> ${product.brand?.title || 'Unknown'}</p>
                        </div>
                    </div>
                `;


                $('#productModal').modal('show');
            });


        });

        document.addEventListener('DOMContentLoaded', function () {
            // Create overlay element
            const overlay = document.querySelector('.filter-overlay');
            const filterToggle = document.querySelector('.filter-toggle-cbtn');
            const filterSidebar = document.querySelector('.filter-sidebar');

            if (filterToggle && filterSidebar) {
                // Show filter sidebar on toggle button click
                filterToggle.addEventListener('click', function () {
                    filterSidebar.classList.add('active');
                    overlay.classList.add('active');
                    document.body.style.overflow = 'hidden';

                    // Add close button if not already present
                    if (!filterSidebar.querySelector('.filter-close-cbtn')) {
                    const closeBtn = document.createElement('button');
                    closeBtn.className = 'filter-close-cbtn';
                    closeBtn.innerHTML = '&times;';
                    closeBtn.addEventListener('click', function () {
                        filterSidebar.classList.remove('active');
                        overlay.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                    filterSidebar.prepend(closeBtn);
                    }
                });

                // Hide filter sidebar on overlay click
                overlay.addEventListener('click', function () {
                    filterSidebar.classList.remove('active');
                    overlay.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }

        });
    </script>    
@endsection

{{-- <div class="price">
    <span>$${product.price}</span>
    ${product.old_price ? `<span class="old-price">$${product.old_price}</span>` : ''}
</div> --}}

{{-- <div class="price">
    <span>$${product.price}</span>
    ${product.old_price ? `<span class="old-price">$${product.old_price}</span>` : ''}
</div> --}}


{{-- <p><strong>Price:</strong> $${product.price}</p>
${product.old_price ? `<p><strong>Old Price:</strong> $${product.old_price}</p>` : ''}
<p><strong>Quantity:</strong> ${product.quantity}</p> --}}