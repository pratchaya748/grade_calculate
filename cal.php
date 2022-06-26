<?php 
                        $cax = $_POST['cax'];
                        $cgx = $_POST['cgx'];
                        $cre1 = $_POST['cre1'];
                        $cre2 = $_POST['cre2'];
                        $cre3 = $_POST['cre3'];
                        $cre4 = $_POST['cre4'];
                        $cre5 = $_POST['cre5'];
                        $cre6 = $_POST['cre6'];
                        $cre7 = $_POST['cre7'];
                        $grade1 = $_POST['grade1'];
                        $grade2 = $_POST['grade2'];
                        $grade2 = $_POST['grade2'];
                        $grade3 = $_POST['grade3'];
                        $grade4 = $_POST['grade4'];
                        $grade5 = $_POST['grade5'];
                        $grade6 = $_POST['grade6'];
                        $grade6 = $_POST['grade6'];

                        $gp1 = $cre1 * $grade1;
                        $gp2 = $cre2 * $grade2;
                        $gp3 = $cre3 * $grade3;
                        $gp4 = $cre4 * $grade4;
                        $gp5 = $cre5 * $grade5;
                        $gp6 = $cre6 * $grade6;
                        $gp7 = $cre7 * $grade7;

                        $cax2 = $cax + $cre2;
                        $cax3 = $cax2 + $cre3;
                        $cax4 = $cax3 + $cre4;
                        $cax5 = $cax4 + $cre5;
                        $cax6 = $cax5 + $cre6;
                        $cax7 = $cax6 + $cre7;

                        $cgx2 = $cgx + $gp2;
                        $cgx3 = $cgx + $gp3;
                        $cgx4 = $cgx + $gp4;
                        $cgx5 = $cgx + $gp5;
                        $cgx6 = $cgx + $gp6;
                        $cgx7 = $cgx + $gp7;

                        $totalcax = $cax1 + $cax2 + $cax3 + $cax4 + $cax5 + $cax6 + $cax7;
                        $totalcredit = $cre1 + $cre2 + $cre3 + $cre4 + $cre5 + $cre6 + $cre7;
                        $gpa1 = $cgx7 + $totalcredit;
                        $gpa2 = $cax7 + $totalcax;
                        $gpa = $gpa1 / $gpa2;

                        print "gfghd".$gpa

                        ?>