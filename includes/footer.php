<footer>
            <div class="footer-wrap">
                <div class="contact-social-other">
                    <div class="cso-title">
                        <h1>Contact:</h1>
                    </div>

                    <div class="sco-content">
                        <ul>
                        <?php
                            $query = "SELECT * FROM my_contact_deteils";
                            $select_contact_details = mysqli_query($connection, $query);
                            while($contact_details_row = mysqli_fetch_assoc($select_contact_details)){
                                $detail_id = $contact_details_row['id'];
                                $type_of_contact = $contact_details_row['type_of_contact'];
                                $contact_details = $contact_details_row['contact_details'];
                                    if($type_of_contact == "Email"){
                                       echo '<li><i class="fas fa-at"></i><a href="mailto:'.$contact_details.'">'.$contact_details.'</a></li>';
                                    }else if($type_of_contact == "Phone"){
                                        echo '<li><i class="fas fa-mobile-alt"></i><a href="tel:'.$contact_details.'">'.$contact_details.'</a></li>';
                                    }else if($type_of_contact == "Facebook"){
                                        echo '<li><i id="fb" class="fab fa-facebook"></i><a href="'.$contact_details.'">'.$type_of_contact.'</a></li>';
                                    }else if($type_of_contact == "Instagram"){
                                        echo '<li><i id="instagram" class="fab fa-instagram"></i><a href="'.$contact_details.'">'.$type_of_contact.'</a></li>';
                                    }else if($type_of_contact == "Twitter"){
                                        echo '<li><i class="fab fa-twitter"></i><a href="'.$contact_details.'">'.$type_of_contact.'</a></li>';
                                    }



                              
        ?>
                       



                         
                            <!-- <li><i class="fas fa-mobile-alt"></i><a href="">+44 7777 777777</a></li> -->
                            <?php } ?>
                            <!-- <li><i id="fb" class="fab fa-facebook"></i></i><a href="https://www.facebook.com/szelag.maciej/">Fecebook</a></li>
                            <li><i id="instagram" class="fab fa-instagram"></i><a href="">Instagram</a></li> -->

                         
                        </ul>
                    </div>
                </div>
            
                <div class="contact-social-other">
                    <div class="cso-title">
                        <h1>Cities:</h1>
                    </div>
                    <div class="sco-content">
                        <ul>
                            <li><i class="far fa-building"></i><a href="">Plymouth</a></li>
                            <li><i class="far fa-building"></i></i><a href="">Exeter</a></li>
                            <li><i class="fas fa-building"></i><a href="">Bristol</a></li>
                            <li><i class="fas fa-city"></i><a href="">London</a></li>
                        </ul>
                    </div>
                </div>
           

            </div>
            <div class="copyrights">
               www.msweb.co.uk - Creating websites.
            </div>

        </footer>

        <script src="js/main.js"></script>
    </body>

</html>
