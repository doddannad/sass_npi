<div class="search-nav">
  <div class="container-fluid">
    <div class="row search-nav-row">
      <div class="col-6 col-sm-6 col-md-3 col-lg-2 order-0 search-nav-brand">
        <h4 class="brand g-0">New Project Info</h4>
        <small class="text-muted"><i class="fa fa-building"></i> Let's you home</small>
      </div>
      <div class="col-6 col-sm-6 col-md-3 order-1 order-md-2 search-nav-link">
        <ul class="list-unstyled d-flex flex-row justify-content-between">
          <li><a class="text-decoration-none" href="#" role="button" data-bs-toggle="modal" data-bs-target="#enquieryModal">Sign-In<i class="fa fa-sign-in"></i></a></li>
          <li><a class="text-decoration-none" href="tel:+919986219795">Call-Us<i class="fa fa-phone"></i></a></li>
          <li><a class="text-decoration-none" href="https://api.whatsapp.com/send?phone=+919986219795">Message<i class="fab fa-whatsapp"></i></a></li>
        </ul>
      </div>
      <div class="col-12 col-sm-12 col-md-6 col-lg-7 order-2 order-md-1 search-nav-form">
        <form action="search_result.php" method="get">
          <div class="row g-0">
            <div class="col-4 col-sm-2 city">
              <input class="form-control fetch_suggestion" name="city" list="city_select" id="cityDataList" autocomplete="off" placeholder="City...">
              <datalist id="city_select">
                <?php
                foreach ($cityArray as $city) {
                  $city_name = $city['city_name'];
                ?>
                  <option value="<?php echo $city_name ?>"><?php echo $city_name ?></option>
                <?php } ?>
              </datalist>
            </div>
            <div class="col-8 col-sm-9 keyword">
              <input type="text" class="form-control keyword_input" list="suggestions" name="searchKeyword" placeholder="Enter Keyword" style="background-image: url(assets/images/icons/search_black_24dp.svg) ">
              <datalist id="suggestions"></datalist>
            </div>
            <div class="col-12 col-sm-1 d-grid button-wrap">
              <button type="submit" name="searchBtn" class="btn btn-danger btn-sm"><i class="fa fa-chevron-circle-right"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- ./ search nav -->