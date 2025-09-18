


    <div class="shopify-grid">
      <div class="container-fluid">
        <div class="row g-5">
          <aside class="col-md-2">
            <div class="sidebar">
              <div class="widget-menu">
                <div class="widget-search-bar">
                  <form role="search" method="get" class="d-flex position-relative">
                    <form class="d-flex mt-3 gap-0" action="index.html">
                      <input class="form-control form-control-lg rounded-2 bg-light" type="email" placeholder="Search here" aria-label="Search here">
                      <button class="btn bg-transparent position-absolute end-0" type="submit"><svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#search"></use></svg></button>
                    </form>
                  </form>
                </div>
              </div>
              <div class="widget-product-categories pt-5">
                <h5 class="widget-title">Categories</h5>
                <ul class="product-categories sidebar-list list-unstyled">
                  <li class="cat-item">
                    <a href="/collections/categories">All</a>
                  </li>
                  <li class="cat-item">
                    <a href="#" class="nav-link">Phones</a>
                  </li>
                  <li class="cat-item">
                    <a href="#" class="nav-link">Accessories</a>
                  </li>
                  <li class="cat-item">
                    <a href="#" class="nav-link">Tablets</a>
                  </li>
                  <li class="cat-item">
                    <a href="#" class="nav-link">Watches</a>
                  </li>
                </ul>
              </div>
              <div class="widget-product-tags pt-3">
                <h5 class="widget-title">Tags</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="#" class="nav-link">White</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Cheap</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Mobile</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Modern</a>
                  </li>
                </ul>
              </div>
              <div class="widget-product-brands pt-3">
                <h5 class="widget-title">Brands</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="#" class="nav-link">Apple</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Samsung</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">Huwai</a>
                  </li>
                </ul>
              </div>
              <div class="widget-price-filter pt-3">
                <h5 class="widget-titlewidget-title">Filter By Price</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="#" class="nav-link">Less than $10</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$10- $20</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$20- $30</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$30- $40</a>
                  </li>
                  <li class="tags-item">
                    <a href="#" class="nav-link">$40- $50</a>
                  </li>
                </ul>
              </div>
            </div>
          </aside>

          <main class="col-md-10">
            <div class="filter-shop d-flex justify-content-between">
              <div class="showing-product">
                <p>Showing 1–9 of 55 results</p>
              </div>
              <div class="sort-by">
                <select id="input-sort" class="form-control" data-filter-sort="" data-filter-order="">
                  <option value="">Default sorting</option>
                  <option value="">Name (A - Z)</option>
                  <option value="">Name (Z - A)</option>
                  <option value="">Price (Low-High)</option>
                  <option value="">Price (High-Low)</option>
                  <option value="">Rating (Highest)</option>
                  <option value="">Rating (Lowest)</option>
                  <option value="">Model (A - Z)</option>
                  <option value="">Model (Z - A)</option>   
                </select>
              </div>
            </div>
            
            <div class="product-grid row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">

              <div class="col">
                <div class="product-item">
                  <span class="badge bg-success position-absolute m-3">-30%</span>
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-orange-juice.png') ?>" alt="Product Thumbnail" class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-raspberries.png') ?>" alt="Product Thumbnail" class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>
                  
              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-bananas.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-biscuits.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-cucumber.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-milk.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-bananas.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-biscuits.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-cucumber.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-milk.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-bananas.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="product-item">
                  <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                  <figure>
                    <a href="single-product.html" title="Product Title">
                      <img src="<?= asset('assets/images/thumb-biscuits.png') ?>"  class="tab-image">
                    </a>
                  </figure>
                  <h3>Sunstar Fresh Melon Juice</h3>
                  <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                  <span class="price">$18.00</span>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="input-group product-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus btn btn-danger btn-number"  data-type="minus">
                              <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                            </button>
                        </span>
                        <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                                <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                            </button>
                        </span>
                    </div>
                    <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                  </div>
                </div>
              </div>

            </div>
            <!-- / product-grid -->

            <nav class="text-center py-4" aria-label="Page navigation">
              <ul class="pagination d-flex justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link bg-none border-0" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="page-item active" aria-current="page"><a class="page-link border-0" href="#">1</a></li>
                <li class="page-item"><a class="page-link border-0" href="#">2</a></li>
                <li class="page-item"><a class="page-link border-0" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link border-0" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>

          </main>
          
        </div>
      </div>
    </div>

    <section class="py-5">
      <div class="container-fluid">

        <div class="bg-secondary py-5 my-5 rounded-5" style="background: url('images/bg-leaves-img-pattern.png') no-repeat;">
          <div class="container my-5">
            <div class="row">
              <div class="col-md-6 p-5">
                <div class="section-header">
                  <h2 class="section-title display-4">Get <span class="text-primary">25% Discount</span> on your first purchase</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dictumst amet, metus, sit massa posuere maecenas. At tellus ut nunc amet vel egestas.</p>
              </div>
              <div class="col-md-6 p-5">
                <form>
                  <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"
                      class="form-control form-control-lg" name="name" id="name" placeholder="Name">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-lg" name="email" id="email" placeholder="abc@mail.com">
                  </div>
                  <div class="form-check form-check-inline mb-3">
                    <label class="form-check-label" for="subscribe">
                    <input class="form-check-input" type="checkbox" id="subscribe" value="subscribe">
                    Subscribe to the newsletter</label>
                  </div>
                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-dark btn-lg">Submit</button>
                  </div>
                </form>
                
              </div>
              
            </div>
            
          </div>
        </div>
        
      </div>
    </section>
