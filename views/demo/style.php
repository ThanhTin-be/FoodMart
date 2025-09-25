

    <section class="py-5 mb-5" style="background: url('<?= asset('background-pattern.jpg') ?>');">
      <div class="container-fluid">
        <div class="d-flex justify-content-between">
          <h1 class="page-title pb-2">Styles & Elements</h1>
          <nav class="breadcrumb fs-6">
            <a class="breadcrumb-item nav-link" href="#">Home</a>
            <a class="breadcrumb-item nav-link" href="#">Pages</a>
            <span class="breadcrumb-item active" aria-current="page">Styles</span>
          </nav>
        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container-fluid">
        <div class="row mb-3">
    
          <div class="col-md-6">
    
            <h3>Sample Heading 3</h3>
    
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
          </div>
    
          <div class="col-md-6">
    
            <h3>Sample Heading 3</h3>
    
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
          </div>
        </div>
    
        <div class="row mb-3">
    
          <div class="col-md-4">
    
            <h4>Sample Heading 4</h4>
    
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
          </div>
    
          <div class="col-md-4">
    
            <h4>Sample Heading 4</h4>
    
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
          </div>
    
          <div class="col-md-4">
    
            <h4>Sample Heading 4</h4>
    
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    
          </div>
        </div>
    
        <div class="row">
          <div class="col-md-12">
            <hr>
            <h2>Images and Lightboxes</h2>
          </div>
        </div>
    
        <div class="row">
          <div class="col-md-6">
            <figure>
              <img src="<?= asset('post-thumb-1.jpg') ?>" alt="Sample Image" class="img-fluid">
              <figcaption>Sample Caption</figcaption>
            </figure>
          </div>
          <div class="col-md-6">
            <figure>
              <a href="images/product-large-3.jpg" title="Calm Before The Storm (One Shoe Photography Ltd.)" class="image-link"><img src="<?= asset('product-large-3.jpg') ?>" alt="Sample Image" class="img-fluid"></a>
              <figcaption>Opens up Lighbox Gallery</figcaption>
            </figure>
          </div>
        </div>
    
      </div>
    </section>
    
    <section class="my-3">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col">
            <h2 class="section-title text-center mb-5">Toggles and Accordions</h2>
          </div>
        </div>
    
        <div class="row">
          <div class="col">
    
            <div class="accordion mb-5" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Accordion Item #1
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                  <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Accordion Item #2
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                  <div class="accordion-body">
                    <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Accordion Item #3
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                  <div class="accordion-body">
                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                  </div>
                </div>
              </div>
            </div>
    
          </div>	
        </div>
      </div>
    </section>
    
    <section class="my-3">
      <div class="container-fluid">
        
        <div class="row">
          <div class="col-md-12">
            <h2>Tabs and Toggles</h2>
          </div>
        </div>
    
        <div class="row mb-3">
          <div class="col-md-12">
            <blockquote><p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p></blockquote>
            <p>
              Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p><img src="<?= asset('post-thumb-2.jpg') ?>" class="float-end">
    
            <p><span class="dropcap">P</span>ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. <span class="highlight">Praesent dapibus, neque id cursus</span> faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
    
            <h3 class="mt-5">Paragraph</h3>
            <p>Pellentesque <strong>habitant morbi tristique senectus et netus et</strong> malesuada fames ac turpis egestas. sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis.</p>
    
            <p>Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus <blockquote class="pullquote-right">Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</blockquote> Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. <a href="#">Quisque</a> sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
          </div>
        </div>
    
        <div class="row mb-3">
          <div class="col-md-6">
            <h3>Unordered List</h3>
            <ul>
               <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
               <li>Aliquam tincidunt mauris eu risus.</li>
               <li>Vestibulum auctor dapibus neque.</li>
               <li>Aliquam tincidunt mauris eu risus.</li>
               <li>Vestibulum auctor dapibus neque.</li>
            </ul>
                 
          </div>
          <div class="col-md-6">
            <h3>Ordered List</h3>
            <ol>
               <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
               <li>Aliquam tincidunt mauris eu risus.</li>
               <li>Vestibulum auctor dapibus neque.</li>
               <li>Aliquam tincidunt mauris eu risus.</li>
               <li>Vestibulum auctor dapibus neque.</li>
            </ol>
            
          </div>
        </div>
    
        <div class="container-fluid px-4 py-5" id="icon-grid">
    
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-5 py-5">
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cart"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cart"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#calendar"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#cart"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#heart"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#category"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#check"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
              <div class="col d-flex align-items-start">
                <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em"><use xlink:href="#heart"></use></svg>
                <div>
                  <h4 class="fw-bold mb-0">Featured title</h4>
                  <p>Paragraph of text beneath the heading to explain the heading.</p>
                </div>
              </div>
            </div>
        </div>
    
        <div class="row my-3">
          <hr>
          <div class="col-md-6">
    
            <h3>Table</h3>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
    
          </div>
    
          <div class="col-md-6">
    
            <h3>Table Striped</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td colspan="2">Larry the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
    
          </div>
          
        </div>
    
        <div class="row my-3">
          <div class="col-md-12">
            <pre class="pre"><code>.some-class {
              background-color: red;
            }</code></pre>
                 
          </div>
          
        </div>
    
        <div class="row">
          <div class="col-md-12">
            <h2>Tabs and Toggles</h2>
          </div>
        </div>
    
        <div class="row">
          <div class="col-md-6">
    
            <div class="bootstrap-tabs">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                  <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</div>
              </div>
            </div>
    
          </div>
    
          <div class="col-md-6">
    
            <div class="accordion" id="accordionExample2">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse1" aria-expanded="true" aria-controls="accordion-collapse1">
                    Accordion Item #1
                  </button>
                </h2>
                <div id="accordion-collapse1" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse2" aria-expanded="false" aria-controls="accordion-collapse2">
                    Accordion Item #2
                  </button>
                </h2>
                <div id="accordion-collapse2" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-collapse3" aria-expanded="false" aria-controls="accordion-collapse3">
                    Accordion Item #3
                  </button>
                </h2>
                <div id="accordion-collapse3" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample2">
                  <div class="accordion-body">
                    Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                  </div>
                </div>
              </div>
            </div>
    
          </div>
    
        </div>
    
        <div class="row mt-5 mb-5">
          <div class="col-12">
            <h3>Button Sizes</h3>
            <button type="button" class="btn btn-primary btn-sm">small</button>
            <button type="button" class="btn btn-primary btn-lg">large</button>
    
            <hr>
    
            <h3>Button Styles</h3>
    
            <button type="button" class="btn btn-outline-dark">Outline Dark</button>
            <button type="button" class="btn btn-outline-primary">Outline Primary</button>
            <button type="button" class="btn btn-outline-success rounded-pill">Outline Success Pill</button>
            <button type="button" class="btn btn-outline-danger rounded-pill">Outline Danger Pill</button>
    
            <hr>
    
            <h3>Button Colors</h3>
    
            <button type="button" class="btn btn-primary">primary</button>
            <button type="button" class="btn btn-secondary">secondary</button>
            <button type="button" class="btn btn-info rounded-pill">info Pill</button>
            <button type="button" class="btn btn-dark rounded-pill">dark Pill</button>
            <button type="button" class="btn btn-warning rounded-pill">warning Pill</button>
            <button type="button" class="btn btn-success rounded-pill">success Pill</button>
            <button type="button" class="btn btn-danger rounded-pill">danger Pill</button>

            <hr>
    
            <h3>Extra Large Button</h3>
    
            <div class="d-grid">
              <button class="btn btn-secondary w-100 btn-lg">Extra Large Full Width Button</button>
            </div>
    
          </div>
        </div>
    
        <div class="row mt-5 mb-5">
          <div class="col-md-12">
            <h2>Forms</h2>
          </div>
          <div class="col-md-6">
            <!-- Standard Headings -->
            <h1>Heading</h1>
            <h2>Heading</h2>
            <h3>Heading</h3>
            <h4>Heading</h4>
            <h5>Heading</h5>
            <h6>Heading</h6>
    
            <!-- Base type size -->
            <p>The base type is 15px over 1.6 line height (24px)</p>
    
            <!-- Other styled text tags -->
            <strong>Bolded</strong>
            <em>Italicized</em>
            <a>Colored</a>
            <u>Underlined</u>
          </div>
          <div class="col-md-6">
            
            <form name="contactform" action="contact.php" method="post" class="form-group contact-form mt-4">
              <div class="row">
                  <div class="col-md-6">
                  <input type="text" minlength="2" name="name" placeholder="Name" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <input type="email" name="email" placeholder="E-mail" class="form-control" required>
                </div>
              </div>
    
              <div class="row">
                <div class="col-md-12">
    
                  <textarea class="form-control mt-4 mb-4" name="message" placeholder="Message" style="height: 150px;" required></textarea>
    
                  <label>
                      <input type="checkbox" required>
                      <span class="label-body">I agree all the <a href="#">Terms and Conditions</a></span>
                  </label>
    
                  <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-dark">Submit</button>
                  </div>
                </div>
              </div>
            </form>
    
          </div>
        </div>
    
        <h2 class="display-6 text-center mb-4">Pricing Tables</h2>
    
          <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Free</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$0<small class="text-muted fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>10 users included</li>
                    <li>2 GB of storage</li>
                    <li>Email support</li>
                    <li>Help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm">
                <div class="card-header py-3">
                  <h4 class="my-0 fw-normal">Pro</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$15<small class="text-muted fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>20 users included</li>
                    <li>10 GB of storage</li>
                    <li>Priority email support</li>
                    <li>Help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm border-primary">
                <div class="card-header py-3 text-white bg-primary border-primary">
                  <h4 class="my-0 fw-normal">Enterprise</h4>
                </div>
                <div class="card-body">
                  <h1 class="card-title pricing-card-title">$29<small class="text-muted fw-light">/mo</small></h1>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li>30 users included</li>
                    <li>15 GB of storage</li>
                    <li>Phone and email support</li>
                    <li>Help center access</li>
                  </ul>
                  <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                </div>
              </div>
            </div>
          </div>
    
          <h2 class="display-6 text-center mb-4">Compare plans</h2>
    
          <div class="table-responsive mb-5">
            <table class="table text-center">
              <thead>
                <tr>
                  <th style="width: 34%;"></th>
                  <th style="width: 22%;">Free</th>
                  <th style="width: 22%;">Pro</th>
                  <th style="width: 22%;">Enterprise</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="text-start">Public</th>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Private</th>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                </tr>
              </tbody>
    
              <tbody>
                <tr>
                  <th scope="row" class="text-start">Permissions</th>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Sharing</th>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Unlimited members</th>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                </tr>
                <tr>
                  <th scope="row" class="text-start">Extra security</th>
                  <td></td>
                  <td></td>
                  <td><svg class="bi" width="24" height="24"><use xlink:href="#check"></use></svg></td>
                </tr>
              </tbody>
            </table>
          </div>
    
      </div>
    </section>

   