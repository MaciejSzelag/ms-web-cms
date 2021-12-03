
<div class="container">
<h1>Number of visits by IP Address</h1>
    <div class="table-wrap">
        <table class="small">
            <thead>
                <tr>
                    <th>IP adress</th>
                    <th>Number of visits</th>
                    <th>Last visit</th>
                    <th>Delete</th>
                
                </tr>
            </thead>
            <tbody>
     
                <?php

                $query = "SELECT * FROM ip_adresses";
                $select_ips = mysqli_query($connection,$query);
                                    if(!$select_ips){
                                            die(mysqli_error($connection));
                                    }

                    while($ips_row = mysqli_fetch_assoc( $select_ips)){
                        $id_ip = $ips_row['id_ip'];
                        $IP_address = $ips_row['IP_address'];
                        $number_of_visits = $ips_row['number_of_visits'];
                        $last_visit = $ips_row['last_visit'];
                                 
                ?>

            <tr>
                    <td><?php echo $IP_address;?></td>
                    <td><?php echo $number_of_visits;  ?></td>
                    <td><?php echo $last_visit;  ?></td>
                    <td><a href="index.php?source=table-visits-by-ip&delete=<?php echo $id_ip;?>">Delete</a></td>
                   
     
               
          
             
                </tr>
                <?php 
                        deletePosition($id_ip, 'ip_adresses','id_ip', 'index.php?source=table-visits-by-ip');

                     
                ?>
                <?php } ?>
          

            
            </tbody>
        </table>
    </div>
    


</div>