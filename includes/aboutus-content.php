<?php
/**
 * Generate the content for aboutus pages
 * @return string generated HTML
 */
 function generatedMyInformation() {
     $output='
     <main class="mdl-layout__content">
            <div class="page-content">
                <h2>About Us</h2><hr>
                <h4>Personal Information</h4>
                <p><span>Group member Names: </span>Grace (Xia) Wang,  Bowie Huang</p>
                <p><span>Course Name: </span>COMP-3512 Web2</p>
                <p><span>Instructor: </span>Randy Connolly</p>
                <p><span>Project Name: </span>Assignment #2: Data-Driven PHP & JavaScript</p>
                <p><span>Institution: </span>Mount Royal University</p>
                <p><span>Date: </span>Nov 18, 2017</p>
                <p><span>Discription: </span>This project provides an opportunity to generate
                    dynamic web pages from database content using PHP.</p>
                <p><span>Resources: </span></p>
                <ul>
                    <li><a href="https://getmdl.io/components/index.html"><p><span>Google Materials Lite (MDL)</span></p></a></li>
                    <li><a href="https://xwang230-comp3512-assign2-gracewang.c9users.io/phpmyadmin/#PMAURL-0:index.php?db=&table=&server=1&target=&token=0666a61a9e768f6a6b353950d6d415f9"><p><span>phpMyAdmin Database</span></p></a></li>
                    <li><a href="https://github.com/rconnolly/comp3512-f2017-assign1/tree/master/book-images"><p><span>Book-images</span></p></a></li>
                    <li><a href="https://www.google.ca/"><p><span>Google Images</span></p></a></li>
                    <li><a href="https://github.com/GraceWang17/xwang230-comp3512-assign3/"><p><span>GitHub</span></p></a></li>
                </ul>
            </div>
        </main>
     ';
     return $output;
 }
?>