<?php //first connect to the database 
require_once( 'includes/connect.php');
 ?>
<!doctype html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="images/favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="css/style.css">
        <title>Celtic Music</title>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <div class="container">
            <header class="header clearfix">
                <div class="logo">Celtic Music</div>
                <nav class="menu_main">
                    <ul>
                            <li><a class="active" href="index.php">Home</a></li>
                            <li><a href="activity.php?id=10&theme=scotish">Scotland</a></li>
                            <li><a href="activity.php?id=13&theme=irish">Ireland</a></li>
                            <li><a href="activity.php?id=21&theme=wales">Wales</a></li>
                            <li><a href="activity.php?id=24&theme=man">Isle of Man</a></li>
                            <li><a href="activity.php?id=29&theme=cornwall">Cornwall</a></li>
                            <li><a href="activity.php?id=6&theme=bretton">Brittany</a></li>
                        <li>
                            <form action="search_result.php" method="post" id="searchform">
                                <input type="text" size="18" maxlength="30" name="search" />
                                <input type="submit" class="button" name="submit" value="Search" />
                            </form>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="info">
                <article class="hero clearfix">
                    <div class="col_100">


                        <div class="col_66">
                            <hr/>
                            <h3>Traditional Irish Music</h3>

                                <p>The Irish folk music is a term that is used for music that has been composed in various genres all over Ireland. 
                                The traditional songs were always written in the Irish language. 
                                (Today, we find the use of the English language) The melody was always considered to be the most important factor and therefore the harmony was kept simple. 
                                This was also the time when the sean-nos were considered the highest point of traditional singing. 
                                The sean-nos are the unaccompanied vocals. This is always performed in a solo version. 
                                One's style is also considered to be very important in traditional Irish music. 
                                The Irish folk music or songs that are completely traditional are at least more than 200 years old. 
                                Solo performances were also preferred as far as Irish folk music was concerned but bands gained popularity during the mid 19th century. 
                                One of the most famous composers who had over 200 compositions to his credit was Turlough Carolan. 
                                His style is actually considered as a classical style.</p>

                                <p>Céilí dance gained popularity in the 19th century. 
                                This is also referred to as a kind of a social gathering that includes music and dance. 
                                A group of musicians always provided music for the Céilí dance with the help of instruments such as the accordion, flute, drums, piano, banjo, etc.</p>

                                <p>Irish music was also very widely used in accompaniment with Irish dance. 
                                The beauty of stepdancing was aptly depicted in Riverdance.</p>

                                <p>Sadly, one saw a drop in the number of genuinely interested people in traditional Irish music around the 1930s. 
                                Experts have their difference of opinions about the use of the various types of musical instruments in traditional Irish music. 
                                It is said that the bouzoukis and the guitars were used in the late 1960s. 
                                Some musical instruments made their appearance only in the later years. 
                                Let us take a look at some of the musical instruments used to create the melodious tunes that are found in Ireland.</p>
                        </div>
                        <div class="col_33">
                            <hr/>
                            <h3>Instruments used in Irish Music</h3>
                            <?php include('includes/information.php'); ?></div>
                    </div>
                    <div class="clearfix"></div>
                </article>
            </div>
            <footer class="footer clearfix">
                <div class="copyright">Celtic Music || <a href="login.php">Admin</a>
                </div>
                <nav class="menu_bottom">
                    <ul>
                           <li><a class="active" href="index.php">Home</a></li>
                            <li><a href="activity.php?id=10&theme=scotish">Scotland</a></li>
                            <li><a href="activity.php?id=13&theme=irish">Ireland</a></li>
                            <li><a href="activity.php?id=21&theme=wales">Wales</a></li>
                            <li><a href="activity.php?id=24&theme=man">Isle of Man</a></li>
                            <li><a href="activity.php?id=29&theme=cornwall">Cornwall</a></li>
                            <li><a href="activity.php?id=6&theme=bretton">Brittany</a></li>
                        </li>
                    </ul>
                </nav>
            </footer>
        </div>
    </body>

</html>