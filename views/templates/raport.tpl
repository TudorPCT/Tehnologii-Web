<!DOCTYPE html>
<html lang="EN">
    <head>
        <meta charset="utf-8">
        <title>SMB (Social Media Box)</title>
    </head>
    
    <article>
        <header>
            <h1>
                Raport SMB (Social Media Box)
            </h1>
        </header>
        <div role="contentinfo">
            <section typeof="sa:AuthorsList">
                <h2>Team members</h2>
                <ul>
                    <li typeof="sa:ContributorRole" property="schema:author">
                        <span typeof="schema:Person">
                            <meta property="schema:givenName" content="Cosmin">
                            <meta property="schema:additionalName" content="Tudor">
                            <meta property="schema:familyName" content="Pasat">
                            <span property="schema:name">Pasat Tudor Cosmin</span>
                        </span>
                        <a href="#sa" property="sa:roleAffiliation" resource="https://www.info.uaic.ro/">FII</a>,
                        B3
                        <ul>
                            <li property="schema:roleContactPoint" typeof="schema:ContactPoint">
                              <a href="mailto:tudor.pasat@info.uaic.ro"
                                 property="schema:email">tudor.pasat@info.uaic.ro</a>
                            </li>
                        </ul>
                    </li>
                    <li typeof="sa:ContributorRole" property="schema:author">
                        <span typeof="schema:Person">
                            <meta property="schema:givenName" content="Raluca">
                            <meta property="schema:additionalName" content="Loredana">
                            <meta property="schema:familyName" content="Romașcu">
                            <span property="schema:name">Romașcu Raluca Loredana</span>
                        </span>
                        <a href="#sa" property="sa:roleAffiliation" resource="https://www.info.uaic.ro/">FII</a>,
                        B3
                        <ul>
                            <li property="schema:roleContactPoint" typeof="schema:ContactPoint">
                              <a href="mailto:raluca.romascu@info.uaic.ro"
                                 property="schema:email">raluca.romascu@info.uaic.ro</a>
                            </li>
                        </ul>
                    </li>
                    <li typeof="sa:ContributorRole" property="schema:author">
                        <span typeof="schema:Person">
                            <meta property="schema:givenName" content="Felix">
                            <meta property="schema:additionalName" content="Petru">
                            <meta property="schema:familyName" content="Huțuțuc">
                            <span property="schema:name">Huțuțuc Felix Petru</span>
                        </span>
                        <a href="#sa" property="sa:roleAffiliation" resource="https://www.info.uaic.ro/">FII</a>,
                        B2
                        <ul>
                            <li property="schema:roleContactPoint" typeof="schema:ContactPoint">
                              <a href="mailto:felix.hututuc@info.uaic.ro"
                                 property="schema:email">felix.hututuc@info.uaic.ro</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <section typeof="sa:Affiliations">
                <h2>Affiliations</h2>
                <ul>
                  <li id="sa">
                    <span typeof="schema:Organization" resource="https://www.info.uaic.ro/">
                      <span property="schema:name">Facultatea de Informatică</span>,
                      <span property="schema:parentOrganization">
                        <span typeof="schema:Organization">
                          <span property="schema:name">Universitatea "Alexandru Ioan Cuza"</span>
                          —
                          <span property="schema:location" typeof="schema:Place">
                            <span property="schema:address" typeof="schema:PostalAddress">
                              <span property="schema:addressLocality">Iași</span>,
                              <span property="schema:addressRegion">Iași</span>,
                              <span property="schema:addressCountry">Romania</span>
                            </span>
                          </span>
                        </span>
                      </span>
                    </span>
                  </li>
                </ul>
              </section>
        </div>
        <div role="doc-introduction">
            <h2>1 Introduction</h2>
            
            <section typeof="sa:Purpose">
                <h3>1.1 Purpose</h3>
                <p>
                    The purpose of this document is to present a detailed description of the web application
                    SMB based on the project M-PIC. The document will explain the purpose and features of the application, the
                    interfaces, what the software will do and the constraints under which it must operate. 
                    This document is intended for the potential users of the software.
                </p>
            </section>
            
            <section typeof="sa:DocumentConventions">
                <h3>1.2 Document Conventions</h3>
                <p>
                    This Document was created based on the IEEE template for System Requirement Specification Documents.
                </p>
            </section>

            <section typeof="sa:IntendedAudience">
                <h3>1.3 Intended Audience and Reading Suggestions</h3>
                <p>
                    Users who wish to understand and learn how to use the application and its intended scope.
                </p>
            </section>

            <section typeof="sa:ProductScope">
                <h3>1.4 Product Scope</h3>
                <p>
                    SMB was developed as an open source tool with which users can manage photos from different social media platforms in one place.
                </p>
            </section>

            <section typeof="sa:References">
                <h3>1.5 References</h3>
                <ol>
                    <li typeof="schema:WebPage" role="doc-biblioentry"
                        resource="https://github.com/TudorPCT/Tehnologii-Web.git" property="schema:citation">
                        <cite property="schema:name">
                            <a href="https://github.com/TudorPCT/Tehnologii-Web.git">SMB's Github page</a>
                        </cite>
                    </li>
                    <li typeof="schema:WebPage" role="doc-biblioentry"
                        resource="https://github.com/rick4470/IEEE-SRS-Tempate#42-system-feature-2-and-so-on"
                        property="schema:citation">
                        <cite property="schema:name">
                            <a href="https://github.com/rick4470/IEEE-SRS-Tempate#42-system-feature-2-and-so-on">IEEE
                                Template for System Requirements Specification Documents</a>
                        </cite>
                    </li>
                </ol>
            </section>
        </div>

        <div>
            <h2>2 Overall Description</h2>
            
            <section typeof="sa:ProductPerspective">
                <h3>2.1 Product Description</h3>
                <p>
                    The SMB web application, based on the project M-PIC, has been developed for those that wish to view and manage photos 
                    from all their different social media platforms, while also being able to add more photos to those platforms.
                </p>
            </section>

            <section typeof="sa:ProductFunctions">
                <h3>2.2 Product Functions</h3>
                <p>
                    The web application manages photos imported from different social media platforms like Unsplash or Tumblr. These photos have associated data
                    such as number of likes, comments, downloads or shares. The system offers support for editing these photos,save them in their own computer,
                    using them in collages or uploading photos on a platform (Tumblr offers this option).
                    The application offers the user the option of sharing edited photos or collages.
                </p>

                <section typeof="sa:home">
                    <h4>2.2.1 Home Page</h4> 
                    <p>Central point of navigation to the rest of the pages within the website</p>
                    <ul>
                        <li>
                            Home : redirects back to the home page;
                        </li>
                        <li>
                            Sign In / Register : Redirects to a sign in page.
                        </li>
                    </ul>
                </section>

                <section typeof="sa:signin">
                    <h4>2.2.2 Sign In Page</h4>
                    <ul>
                        <li>
                            Home : redirects back to the home page;
                        </li>
                        <li>
                            Sign In / Register : Refresh the sign in page.
                        </li>
                        <li>
                            Signin : finalizes the login action, logging the user in if the credentials are correct and then redirects the user to their own Accounts page;
                        </li>
                        <li>
                            Create new account : redirects to a Register page.
                        </li>
                    </ul>
                </section>

                <section typeof="sa:register">
                    <h4>2.2.3 Register Page</h4>
                    <ul>
                        <li>
                            Home : redirects back to the home page;
                        </li>
                        <li>
                            Register : creates the user account if the information entered is valid and then redirects the user to their own Accounts page.
                        </li>
                    </ul>
                </section>
                <section typeof="sa:accounts">
                    <h4>2.2.7 Accounts Page</h4>
                    <p>Here the user can manage their connected social media accounts or connect to other accounts.</p>
                    <ul>
                        <li>
                            Add account : Lets the user choose between a list of social media platforms to connect with;
                        </li>
                        <li>
                            Add Account -> Unsplash : Lets the user connect to their Unsplash account.
                        </li>
                        <li>
                            Add Account -> Tumblr : Lets the user connect to their  Tumblr account.
                        </li>
                        <li>
                            Delete Account : Lets the user unlink a social media account from his list;
                        </li>
                        <li>
                            Photos : redirects the user to their Photos page;
                        </li>
                        <li>
                            Logout : logs out the user and redirects to the Home page;
                        </li>
                    </ul>
                </section>

                <section typeof="sa:photos">
                    <h4>2.2.5 Photos Page</h4>
                    <p>
                        The page where the user can see all the photos they uploaded either from social media or their personal device. 
                        The user can select one photo to edit or multiple photos to create a collage.
                    </p>
                    <ul>
                        <li>
                            Accounts : redirects to the connected accounts managing page;
                        </li>
                        <li>
                            Logout : logs out the user and redirects to the Home page;
                        </li>
                        <li>
                            Show Photos : shows the list of accounts for user which can be selected for showing photos;
                        </li>
                        <li>
                            Show Photos ->Unsplash: shows the list of photos from Unsplash account of user;
                        </li>
                        <li>
                            Show Photos ->Tumblr: shows the list of photos from Tumblr account of user;
                        </li>
                        <li>
                            Create collage : Lets the user to select multiple photos and create a collage with them;
                        </li>
                        <li>
                            Filter : Lets the user to see photos from a specified category or in a specified order;
                        </li>
                        <li>
                            Filter -> Number of likes : Are showed only the photos with a certain number of likes, selected by the user;
                        </li>
                        <li>
                            Filter -> Number of shares : Are showed only the photos with a certain number of shares, selected by the user;
                        </li>
                        <li>
                            Filter -> Post Date : Are showed only the photos posted in a certain time, selected by the user;
                        </li>
                        <li>
                            "Click on photo" -> redirects the user to Photo page where he can work with a certain photo;
                        </li>
                    </ul>
                </section>

                <section typeof="sa:photo">
                    <h4>2.2.6 Photo page</h4>
                    <p>This page is opened when a user click on a photo from page photos. Here the user have some options for that photo.</p>
                    <ul>
                        <li>
                            Back : redirects the user back to Photos page;
                        </li>
                        <li>
                            See details : Lets the user see infos about the photo;
                        </li>
                        <li>
                            Edit : Show the user some options for editing photo with different CSS filters and user it;
                        </li>
                        <li>
                            Edit -> Reset : Reset the photo to the original view, without applied filters;
                        </li>
                        <li>
                            Edit -> Save : Lets the user save the photo edited in their personal computer;
                        </li>
                        <li>
                            Edit -> Post : Lets the user post the photo edited on their Tumblr account;
                        </li>
                        <li>
                            Share:
                        </li>
                    </ul>
                </section>
                <section typeof="sa:Collage">

                </section>


            </section>

            <section typeof="sa:userclasses">
                <h3>2.3 User Classes and Characteristics</h3>
                <ul>
                    <li>
                        Guest : simple viewer of the website; can only access the Home, Sign in and Register pages;
                    </li>
                    <li>
                        User : user with an associated account that access the rest of the application.
                    </li>
                </ul>
            </section>

            <section typeof="sa:environment">
                <h3>2.4 Operating Environment</h3>
                <p>
                    The developed product can be used on any device with a connection to the Internet and a browser installed.
                </p>
            </section>

            <section typeof="sa:implementation">
                <h3>2.5 Design and Implementation Constraints</h3>
                <p>
                    SMB will be developed in PHP and uses HTML and CSS for its front-end. It will also use a Postgres database.
                </p>
            </section>
        </div>

        <div>
            <h2>3 External Interface Requirements</h2>

            <section typeof="sa:userinterfaces">
                <h3>3.1 User Interfaces</h3>

                <section>
                    <figure typeof="sa:image">
                        <figcaption>SMB's Home page</figcaption>
                        <img src="./raport_img/home.png" alt="home page screenshot" width="70%">
                    </figure>


                    <figure typeof="sa:image">
                        <figcaption>SMB's Login page</figcaption>
                        <img src="./raport_img/signin.png" alt="login page screenshot" width="70%">
                    </figure>

                    <figure typeof="sa:image">
                        <figcaption>SMB's Register page</figcaption>
                        <img src="./raport_img/register.png" alt="register page screenshot" width="70%">
                    </figure>

                    <figure typeof="sa:image">
                        <figcaption>SMB's My Wall page</figcaption>
                        <img src="./raport_img/mywall.png" alt="my wall page screenshot" width="70%">
                    </figure>

                    <figure typeof="sa:image">
                        <figcaption>SMB's My Wall page</figcaption>
                        <img src="./raport_img/publicwall.png" alt="public wall page screenshot" width="70%">
                    </figure>

                    <figure typeof="sa:image">
                        <figcaption>SMB's Photos page</figcaption>
                        <img src="./raport_img/photos.png" alt="photos page screenshot" width="70%">
                    </figure>

                    <figure typeof="sa:image">
                        <figcaption>SMB's Photo page</figcaption>
                        <img src="./raport_img/photo.png" alt="photo page screenshot" width="70%">
                    </figure>

                    <figure typeof="sa:image">
                        <figcaption>SMB's Accounts page</figcaption>
                        <img src="./raport_img/accounts.png" alt="accounts page screenshot" width="70%">
                    </figure>
                </section>
            </section>

            <section>
                <h3>3.2 Software Interfaces</h3>
                <p>
                    The minimum software requirements of SMB are a working browser and connection to the Internet.
                    The application will use different APIs to connect with the different social media platforms.
                </p>
            </section>

            <section>
                <h4>3.4 Communications Interfaces</h4>
                <p>
                    SMB requires Internet connection. The communication standard that is to be used is HTTP.
                </p>
            </section>
        </div>

        <div>
            <h2>4 System Features</h2>

            <section>
                <h3>4.1 Home page</h3>
                <p>
                    Guests and users can read a little about the motivation behind the web app and navigate to the other pages from this page.
                </p>
            </section>

            <section>
                <h3>4.2 Login page</h3>
                <p>
                    Users of the app can login by entering their credentials and therefore access other functionalities of the app.
                </p>
            </section>

            <section>
                <h3>4.3 SignUp page</h3>
                <p>
                    Guests can create an account and then use it to login into the application and access all the features the account existence provides.
                </p>
            </section>

            <section>
                <h3>4.6 Photos page</h3>
                <p>
                    The page where the user can see all the photos they uploaded from social media .
                    The user can select one photo to edit or multiple photos to create a collage.
                </p>
            </section>

            <section>
                <h3>4.7 Accounts page</h3>
                <p>
                    The user can manage their connected social media accounts or connect to other accounts.
                </p>
            </section>
        </div>

        <div>
            <h2>5 Other Nonfunctional Requirements</h2>

            <section>
                <h3>5.1 Safety Requirements</h3>
                <p>
                    To ensure that no one of SMB's users loses any data while using the application, the dev
                    team works on SMB regularly.
                </p>
            </section>

            <section>
                <h3>5.2 Security Requirements</h3>
                <p>
                    SMB can contain private photos that can only be accesed and viewed by the user that uploaded them. The application also uses a private / public
                    system to prevent other users to view chosen photos.
                </p>
            </section>

            <section>
                <h3>5.3 Software Quality Attributes</h3>
                <ul>
                    <li>Adaptability</li>
                    <li>Portability</li>
                    <li>Reusability</li>
                    <li>Availability</li>
                    <li>Maintanability</li>
                </ul>
            </section>

        </div>

        <div>
            <h2>6 Contribution</h2>
            <section>
                <h3>Pasat Tudor Cosmin:</h3>
                <ul>
                    <li>Site design projection</li>
                    <li>Overall site design structure</li>
                    <li>Specific page design implementation</li>
                    <li>Wall page</li>
                    <li>Public Wall page</li>
                    <li>Accounts page</li>
                    <li>Home page</li>
                    <li>SignIn page</li>
                    <li>SignUp page</li>
                    <li>Documentation</li>
                </ul>
                <h3>Romașcu Raluca Loredana:</h3>
                <ul>
                    <li>Site design projection</li>
                    <li>Overall site design structure</li>
                    <li>Specific page design implementation</li>
                    <li>Photos page</li>
                    <li>Home page</li>
                    <li>Wall page</li>
                    <li>Photo page</li>
                    <li>Photos page</li>
                    <li>Documentation</li>
                </ul>
                <h3>Huțuțuc Felix Petru:</h3>
                <ul>
                    <li>Site design projection</li>
                    <li>Overall site design structure</li>
                    <li>Specific page design implementation</li>
                    <li>Photos page</li>
                    <li>Wall page</li>
                    <li>SignIn page</li>
                    <li>SignUp page</li>
                    <li>Documentation</li>
                </ul>
            </section>
        </div>
    </article>
</html>