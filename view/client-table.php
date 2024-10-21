  <?php require_once('../../controller/client.php');  ?>
  <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NOM_COMPLET</th>
                                                <th>SEXE</th>
                                                <th>TELEPHONE</th>
                                                <th>EMAIL</th>
                                                <th>ADRESSE</th>
                                                <th>DATE</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              <?php while ($et=$resultat->fetch()){?>
                                            <tr>
                                                <td><?php  echo($et['id'])?></td>
                                                <td><?php  echo($et['nom_complet'])?></td>
                                                <td><?php  echo($et['sexe'])?></td>
                                                <td>+<?php  echo($et['telephone'])?></td>
                                                <td><?php  echo($et['email'])?></td>
                                                <td><?php  echo($et['adresse'])?></td>
                                                <td><?php  echo($et['date'])?></td>
                                            
                                            <td>
                                                <a href="./edit-client.php?dk=<?= $et['id'] ?>" class="btn btn-success">Edit</a>
                                                <a onclick="return confirm('Etes-Vous sûr?')" href="../../controller/client.php?id=<?= $et['id'] ?>" class="btn btn-danger">Delete</a></td>
                                             
                                             </tr>
                                               <?php
                                            }
                                                ?>
                                        </tbody>
                                    </table>