<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Social Media Aggregator">
        <meta name="author" content="Team">
        <title> SMB </title>
        <link rel="stylesheet" href="./views/templates/css/style.css">
    </head>
    <body >
    <script src="./views/templates/scripts/photosscripts.js"></script>
        <header>
            <div class="topBar">
                <div id="branding">
                    <img src="./views/templates/img/logo.jpeg" alt="Logo">
                </div>
                <nav>
                    <ul>
                        <li><a href="./?load=accounts">Accounts</a></li>
                        <li class="current"><a href="./?load=photos">Photos</a></li>
                        <li><a href="./?load=logout">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div id="Wrapper">
            <h1>Select the platform to view your photos</h1>
        </div>
    <!-- Side navigation -->
        <div class="sidenav">
            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Show Photos</button>
                    <div class="dropdown-content" id="dropdown-content-1">
                        <button class="dropbtn" onclick="getUnsplashPhotos()">Unsplash</button>
                        <button class="dropbtn">Tumblr</button>
                    </div>
                </div>
            </div>

            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Create collage</button>
                </div>
            </div>
            <div class="sidebtn">
                <div class="dropdown">
                    <button class="dropbtn">Filter</button>
                    <div class="dropdown-content">
                        <div class="sort">
                            <p> Sort:</p> 
                            <ul>
                                <li>
                                  <input type="checkbox" id="cb1" name="cb1" checked>
                                  <label for="cb1">Number of likes ascending</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="cb2" name="cb2">
                                  <label for="cb2">Number of likes descending</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="cb3" name="cb3">
                                  <label for="cb3">Number of comm ascending</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="cb4" name="cb4">
                                    <label for="cb4">Number of comm descending</label>
                                  </li>
                                  <li>
                                    <input type="checkbox" id="cb5" name="cb5">
                                    <label for="cb5">Newest</label>
                                  </li>
                                  <li>
                                    <input type="checkbox" id="cb6" name="cb6">
                                    <label for="cb6">Oldest</label>
                                  </li>
                                  <li>
                                    <input type="checkbox" id="cb7" name="cb7">
                                    <label for="cb7">The most shared</label>
                                  </li>
                              </ul>
                            </div>

                        <div class="likes">
                        <p> Number of likes:</p> 
                        <ul>
                            <li>
                              <input type="checkbox" id="cb8" name="cb8" checked>
                              <label for="cb8">0-300 likes</label>
                            </li>
                            <li>
                              <input type="checkbox" id="cb9" name="cb9">
                              <label for="cb9">300-1000 likes</label>
                            </li>
                            <li>
                              <input type="checkbox" id="cb10" name="cb10">
                              <label for="cb10">1000-max likes</label>
                            </li>
                          </ul>
                        </div>

                        <div class="comments">
                            <p> Number of comments:</p> 
                            <ul>
                                <li>
                                  <input type="checkbox" id="cb11" name="cb11" checked>
                                  <label for="cb11">0-10 comments</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="cb12" name="cb12">
                                  <label for="cb12">10-100 comments</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="cb13" name="cb13">
                                  <label for="cb13">100-max comments</label>
                                </li>
                              </ul>
                            </div>

                            <div class="Date">
                                <p> Post date:</p> 
                                <ul>
                                    <li>
                                      <input type="checkbox" id="cb14" name="cb14" checked>
                                      <label for="cb14">Last month</label>
                                    </li>
                                    <li>
                                      <input type="checkbox" id="cb15" name="cb15">
                                      <label for="cb15">Last year</label>
                                    </li>
                                  </ul>
                                </div>

                                <div class="share">
                                    <p> Number of shares:</p> 
                                    <ul>
                                        <li>
                                          <input type="checkbox" id="cb16" name="cb16" checked>
                                          <label for="cb16">0 shares</label>
                                        </li>
                                        <li>
                                          <input type="checkbox" id="cb17" name="cb17">
                                          <label for="cb17">0-50 shares</label>
                                        </li>
                                        <li>
                                          <input type="checkbox" id="cb18" name="cb18">
                                          <label for="cb18">50-max shares</label>
                                        </li>
                                      </ul>
                                    </div>

                                    <div class="conturi">
                                        <p> Accounts:</p> 
                                        <ul>
                                            <li>
                                              <input type="checkbox" id="cb19" name="cb19" checked>
                                              <label for="cb19">Account insta 1</label>
                                            </li>
                                            <li>
                                              <input type="checkbox" id="cb20" name="cb20">
                                              <label for="cb20">Account insta 2</label>
                                            </li>
                                            <li>
                                              <input type="checkbox" id="cb21" name="cb21">
                                              <label for="cb21">Account Twitter</label>
                                            </li>
                                            <li>
                                                <input type="checkbox" id="cb22" name="cb22">
                                                <label for="cb22">My PC</label>
                                              </li>
                                          </ul>
                                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <p>SMB Copyright &copy; 2022</p>
        </footer>
    </body>
</html>