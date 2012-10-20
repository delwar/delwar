<?php

//  cycle_import_pro.php //

define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "cycle_import_pro.php");
include(RelativePath . "/Common.php");
include(RelativePath . "/UserFunctions.php");

error_reporting(E_ERROR | E_WARNING | E_PARSE);



  echo "<br><br> ******************* START **********CYCLE IMPORT FROM CORP SITE***************";




function fn_Optimize_Receiving_Tables(& $receiver_db){


  echo "<br><br><br><br> Starting M_CYCLE_REF optimizations <br>";

 $SQL1 = "CHECK TABLE $receiver_db.`M_CYCLE_REF`;";
 $SQL2 = " ALTER TABLE $receiver_db.`M_CYCLE_REF` ENGINE = InnoDB; ";
 $SQL3 = "OPTIMIZE TABLE $receiver_db.`M_CYCLE_REF`; ";
 $SQL4 = "FLUSH TABLE $receiver_db.`M_CYCLE_REF`; ";

        $result = @mysql_query( $SQL1 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL1 ".mysql_error());
        }

        $result = @mysql_query( $SQL2 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL2 ".mysql_error());
        }

        $result = @mysql_query( $SQL3 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL3 ".mysql_error());
        }

        $result = @mysql_query( $SQL4 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL4 ".mysql_error());
        }


  echo "<br> Finished: M_CYCLE_REF optimizations ";

  echo "<br> Starting M_CYCLE_DETAIL optimizations ";

 $SQL1 = "CHECK TABLE $receiver_db.`M_CYCLE_DETAIL`;";
 $SQL2 = " ALTER TABLE $receiver_db.`M_CYCLE_DETAIL` ENGINE = InnoDB; ";
 $SQL3 = "OPTIMIZE TABLE $receiver_db.`M_CYCLE_DETAIL`; ";
 $SQL4 = "FLUSH TABLE $receiver_db.`M_CYCLE_DETAIL`; ";

        $result = @mysql_query( $SQL1 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL1 ".mysql_error());
        }

        $result = @mysql_query( $SQL2 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL2 ".mysql_error());
        }

        $result = @mysql_query( $SQL3 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL3 ".mysql_error());
        }

        $result = @mysql_query( $SQL4 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL4 ".mysql_error());
        }




  echo "<br> Finished: M_CYCLE_DETAIL optimizations ";




  echo "<br> optimizing `M_MENU`  ";


 $SQL1 = "CHECK TABLE $receiver_db.`M_MENU`;";
 $SQL2 = "ALTER TABLE $receiver_db.`M_MENU` ENGINE = InnoDB;";
 $SQL3 = "OPTIMIZE TABLE $receiver_db.`M_MENU`; ";
 $SQL4 = " FLUSH TABLE $receiver_db.`M_MENU`;";



            $result = @mysql_query( $SQL1 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL1 ".mysql_error());
            }

            $result = @mysql_query( $SQL2 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL2 ".mysql_error());
            }

            $result = @mysql_query( $SQL3 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL3 ".mysql_error());
            }

            $result = @mysql_query( $SQL4 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL4 ".mysql_error());
            }



   echo "<br> optimize `M_MENU` complete ";


   echo "<br> optimizing `M_MENU_ITEM`  ";



 $SQL1 = "CHECK TABLE $receiver_db.`M_MENU_ITEM`;";
 $SQL2 = "ALTER TABLE $receiver_db.`M_MENU_ITEM` ENGINE = InnoDB;";
 $SQL3 = "OPTIMIZE TABLE $receiver_db.`M_MENU_ITEM`; ";
 $SQL4 = " FLUSH TABLE $receiver_db.`M_MENU_ITEM`;";



            $result = @mysql_query( $SQL1 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL1 ".mysql_error());
            }

            $result = @mysql_query( $SQL2 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL2 ".mysql_error());
            }

            $result = @mysql_query( $SQL3 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL3 ".mysql_error());
            }

            $result = @mysql_query( $SQL4 );
            $err_result = mysql_error();
            if($err_result != ''){
            die ("<br>  error on $SQL4 ".mysql_error());
            }


       echo "<br>`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------<BR><BR>";
}



function fn_Save_Backup_by_Date(& $receiver_db,$TODAYS_DATE,& $obv){


        //`M_CYCLE_REF`    menu connection here

        $SQL_CYR = "DROP TABLE IF EXISTS $receiver_db.`M_CYCLE_REF_$TODAYS_DATE`;  ";

        $result = @mysql_query( $SQL_CYR );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on M_CYCLE_REF_$TODAYS_DATE` <br><br><br>".$SQL_CYR."<br><br>".mysql_error());
        }

        $SQL_CYR = " CREATE  TABLE  $receiver_db.`M_CYCLE_REF_$TODAYS_DATE` (  `M_CYCLE_REF_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT ,  ";
        $SQL_CYR .= " `CYCLE` varchar( 20  )  DEFAULT NULL , ";
        $SQL_CYR .= " `CYCLE_LENGTH` int( 10  ) unsigned  DEFAULT NULL , ";
        $SQL_CYR .= " `CYCLE_LENGTH_TYPE` char( 1  )  DEFAULT NULL , ";
        $SQL_CYR .= " `CYCLE_NOTE` varchar( 150  )  DEFAULT NULL ,  ";
        $SQL_CYR .= " `ACTIVE` char( 1  )  DEFAULT NULL , ";
        $SQL_CYR .= " `INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
        $SQL_CYR .= " `INSERT_DT` date  DEFAULT NULL ,  ";
        $SQL_CYR .= " `UPDATE_BY` varchar( 8  )  DEFAULT NULL , ";
        $SQL_CYR .= " `UPDATE_DT` date  DEFAULT NULL , ";
        $SQL_CYR .= " PRIMARY  KEY (  `M_CYCLE_REF_ID`  ) ,  ";
        $SQL_CYR .= " UNIQUE  KEY  `CYCLE` (  `CYCLE`  ) , ";
        $SQL_CYR .= " KEY  `INSERT_BY` (  `INSERT_BY`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1;  ";

        $result = @mysql_query( $SQL_CYR );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on M_CYCLE_REF_$TODAYS_DATE` <br><br>".$SQL_CYR."<br><br>".mysql_error());
        }
        $SQL_CYR = " INSERT INTO $receiver_db.`M_CYCLE_REF_$TODAYS_DATE` SELECT * FROM $receiver_db.`M_CYCLE_REF`; ";

        $result = @mysql_query( $SQL_CYR );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on M_CYCLE_REF_$TODAYS_DATE` <br><br>".$SQL_CYR."<br><br>".mysql_error());
        }


//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//


         //M_CYCLE_DETAIL    menu connection here

         $SQL_CDT = "DROP TABLE IF EXISTS $receiver_db.`M_CYCLE_DETAIL_$TODAYS_DATE`;  ";

         $result = @mysql_query( $SQL_CDT );
         $err_result = mysql_error();

         if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_CYCLE_DETAIL_$TODAYS_DATE` ".mysql_error());
         }


         $SQL_CDT = " CREATE  TABLE  $receiver_db.`M_CYCLE_DETAIL_$TODAYS_DATE` (  `M_CYCLE_DETAIL_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT , ";
         $SQL_CDT .= "`M_DAYS_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
         $SQL_CDT .= "`M_WEEK_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
         $SQL_CDT .= "`M_CYCLE_REF_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0', ";
         $SQL_CDT .= "`CYCLE_DETAIL_DATE` int( 10  ) unsigned  DEFAULT NULL , ";
         $SQL_CDT .= "`INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
         $SQL_CDT .= "`INSERT_DT` date  DEFAULT NULL , ";
         $SQL_CDT .= "`UPDATE_BY` varchar( 8  )  DEFAULT NULL , ";
         $SQL_CDT .= "`UPDATE_DT` date  DEFAULT NULL , ";
         $SQL_CDT .= "PRIMARY  KEY (  `M_CYCLE_DETAIL_ID`  ) ,  ";
         $SQL_CDT .= "KEY  `M_CYCLE_DETAIL_FKIndex1` (  `M_CYCLE_REF_ID`  ) , ";
         $SQL_CDT .= "KEY  `M_CYCLE_DETAIL_FKIndex2` (  `M_WEEK_REF_ID`  ) , ";
         $SQL_CDT .= "KEY  `M_CYCLE_DETAIL_FKIndex3` (  `M_DAYS_REF_ID`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1; ";

         $result = @mysql_query( $SQL_CDT );
         $err_result = mysql_error();

         if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_CYCLE_DETAIL_$TODAYS_DATE` ".mysql_error());
         }
         $SQL_CDT = "INSERT INTO $receiver_db.`M_CYCLE_DETAIL_$TODAYS_DATE` SELECT * FROM $receiver_db.`M_CYCLE_DETAIL`; ";

         $result = @mysql_query( $SQL_CDT );
         $err_result = mysql_error();

         if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_CYCLE_DETAIL_$TODAYS_DATE` ".mysql_error());
         }



//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//



        $SQL_mnu = "DROP TABLE IF EXISTS $receiver_db.`M_MENU_$TODAYS_DATE`;   ";

        $result = @mysql_query( $SQL_mnu );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_MENU_$TODAYS_DATE` ".mysql_error());
        }


        $SQL_mnu = "CREATE  TABLE  $receiver_db.`M_MENU_$TODAYS_DATE` (  `M_MENU_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT ,  ";
        $SQL_mnu .= "`M_CONSIST_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0',  ";
        $SQL_mnu .= "`M_CYCLE_DETAIL_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0',  ";
        $SQL_mnu .= "`M_THERAPEUTIC_DIET_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
        $SQL_mnu .= "`M_MEAL_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0',  ";
        $SQL_mnu .= "`NOTES` varchar( 255  )  DEFAULT NULL ,  ";
        $SQL_mnu .= "`ACTIVE` char( 1  )  DEFAULT NULL , ";
        $SQL_mnu .= " `INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
        $SQL_mnu .= "`INSERT_DT` date  DEFAULT NULL ,  ";
        $SQL_mnu .= " `UPDATE_BY` varchar( 8  )  DEFAULT NULL , ";
        $SQL_mnu .= "`UPDATE_DT` date  DEFAULT NULL , ";
        $SQL_mnu .= " PRIMARY  KEY (  `M_MENU_ID`  ) ,  ";
        $SQL_mnu .= " KEY  `MENU_FKIndex8` (  `M_MEAL_REF_ID`  ) , ";
        $SQL_mnu .= " KEY  `M_MENU_FKIndex3` (  `M_THERAPEUTIC_DIET_ID`  ) , ";
        $SQL_mnu .= " KEY  `M_MENU_FKIndex1` (  `M_CYCLE_DETAIL_ID`  ) , ";
        $SQL_mnu .= "KEY  `M_MENU_FKIndex4` (  `M_CONSIST_REF_ID`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1; ";

        $result = @mysql_query( $SQL_mnu );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_MENU_$TODAYS_DATE` ".mysql_error());
        }

        $SQL_mnu = "INSERT INTO $receiver_db.`M_MENU_$TODAYS_DATE` SELECT * FROM $receiver_db.`M_MENU`;  ";
        $result = @mysql_query( $SQL_mnu );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_MENU_$TODAYS_DATE` ".mysql_error());
        }




//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//



        $SQL_MNI = "DROP TABLE IF EXISTS $receiver_db.`M_MENU_ITEM_$TODAYS_DATE`; ";

        $result = @mysql_query( $SQL_MNI );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_MENU_ITEM_$TODAYS_DATE` ".mysql_error());
        }


        $SQL_MNI = "CREATE  TABLE  $receiver_db.`M_MENU_ITEM_$TODAYS_DATE` (  `M_MENU_ITEM_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT , ";
        $SQL_MNI .= "`M_RECIPE_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0', ";
        $SQL_MNI .= "`M_MENU_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0', ";
        $SQL_MNI .= "`M_MEAL_PRIORITY_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
        $SQL_MNI .= "`M_MEAL_COMPONENT_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0',";
        $SQL_MNI .= "`M_TEXTURE_ID` int( 10  )  NOT  NULL DEFAULT  '0',";
        $SQL_MNI .= "`LINE_NO` int( 10  ) unsigned  DEFAULT NULL ,";
        $SQL_MNI .= "`MENU_ITEM_PORTION_SIZE` decimal( 4, 2  )  DEFAULT NULL ,";
        $SQL_MNI .= "`MENU_ITEM_PORTION_UOM` int( 10  ) unsigned  DEFAULT NULL ,";
        $SQL_MNI .= " `M_SERVING_UTENSILS_ID` int( 10  ) unsigned  DEFAULT NULL ,";
        $SQL_MNI .= "`LOCATION` char( 3  )  DEFAULT NULL ,";
        $SQL_MNI .= "`SERVE` char( 1  )  DEFAULT NULL , ";
        $SQL_MNI .= "`M_MEAL_COMPONENT_REF_ID_LINKED` int( 10  ) unsigned DEFAULT  '0', ";
        $SQL_MNI .= "`INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
        $SQL_MNI .= "`INSERT_DT` date  DEFAULT NULL , ";
        $SQL_MNI .= "`UPDATE_BY` varchar( 8  )  DEFAULT NULL ,";
        $SQL_MNI .= " `UPDATE_DT` date  DEFAULT NULL ,";
        $SQL_MNI .= " PRIMARY  KEY (  `M_MENU_ITEM_ID`  ) ,";
        $SQL_MNI .= "KEY  `MENU_ITEM_FKIndex1` (  `M_MENU_ID`  ) , ";
        $SQL_MNI .= "KEY  `MENU_ITEM_FKIndex4` (  `M_MEAL_PRIORITY_REF_ID`  ) ,";
        $SQL_MNI .= "KEY  `MENU_ITEM_FKIndex5` (  `M_MEAL_COMPONENT_REF_ID`  ) ,";
        $SQL_MNI .= "KEY  `M_MENU_ITEM_FKIndex6` (  `M_RECIPE_ID`  ) , ";
        $SQL_MNI .= "KEY  `M_TEXTURE_ID` (  `M_TEXTURE_ID`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1; ";

        $result = @mysql_query( $SQL_MNI );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_MENU_ITEM_$TODAYS_DATE` ".mysql_error());
        }


        $SQL_MNI = "INSERT INTO $receiver_db.`M_MENU_ITEM_$TODAYS_DATE` SELECT * FROM $receiver_db.`M_MENU_ITEM`;";
        $result = @mysql_query( $SQL_MNI );
        $err_result = mysql_error();

        if($err_result != ''){
              die( "<br><br>fn_Save_Backup_by_Date :  error on `M_MENU_ITEM_$TODAYS_DATE` ".mysql_error());
        }




//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//
//---------------------------------------------------------------------------------------------------------------------------------//



}


function fn_Restore_Immediate_Backup(& $receiver_db,$TODAYS_DATE,& $obv, $step){

      $ret_val = 1;

        echo "<br><br>starting ****fn_Restore_Immediate_Backup : ******************** ";


      if($step == 0){

          echo "<br><br> ****fn_Restore_Immediate_Backup : ******************** ";
          echo "<br> **************  Nothing to restore! *****step [$step]************* ";
          echo "<br> ********************************** ******************* ";

         return (0);
      }



       echo "<br><br> inside****fn_Restore_Immediate_Backup : ******************** " . $receiver_db ." ". $TODAYS_DATE ." step ". $step;


        //`M_CYCLE_REF`    menu connection here


        if($step >= 3){

        $SQL_CHK = "SELECT `M_CYCLE_REF_ID`, `CYCLE`  FROM $receiver_db.`M_CYCLE_REF_$TODAYS_DATE` WHERE `M_CYCLE_REF_ID` > 0 AND LENGTH(`CYCLE`) > 0 ORDER BY `M_CYCLE_REF_ID` DESC  ";

        $result = @mysql_query( $SQL_CHK );
        $err_result = mysql_error();


         echo "<br><br> ****fn_Restore_Immediate_Backup : ******************** err_result  [$err_result]";


        if($err_result != ''){

        echo ("<br><br> fn_Restore_Immediate_Backup  NO RETRIEVE: `M_CYCLE_REF`_$TODAYS_DATE`  was NOT created (this can be expected if the script errored out earlier)  ".mysql_error());

        }else{

            //-------------------------------------------//
            // if backup exists - restore from backup :  //
            //-------------------------------------------//

            if(@mysql_num_rows($result)>0){      //   `M_CYCLE_REF_$TODAYS_DATE` exists : can re-create  `M_CYCLE_REF`  //


                $SQL_CYR = "DROP TABLE IF EXISTS $receiver_db.`M_CYCLE_REF`;  ";

                $result = @mysql_query( $SQL_CYR );
                $err_result = mysql_error();



                  if($err_result != ''){
                          echo( "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE M_CYCLE_REF` ".mysql_error());
                          $ret_val = 0;
                  }else{ echo "<br><br> ****fn_Restore_Immediate_Backup : execution: DROP TABLE IF EXISTS $receiver_db.`M_CYCLE_REF` complete ";   }


                $SQL_CYR = " CREATE  TABLE  $receiver_db.`M_CYCLE_REF` (  `M_CYCLE_REF_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT ,  ";
                $SQL_CYR .= " `CYCLE` varchar( 20  )  DEFAULT NULL , ";
                $SQL_CYR .= " `CYCLE_LENGTH` int( 10  ) unsigned  DEFAULT NULL , ";
                $SQL_CYR .= " `CYCLE_LENGTH_TYPE` char( 1  )  DEFAULT NULL , ";
                $SQL_CYR .= " `CYCLE_NOTE` varchar( 150  )  DEFAULT NULL ,  ";
                $SQL_CYR .= " `ACTIVE` char( 1  )  DEFAULT NULL , ";
                $SQL_CYR .= " `INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
                $SQL_CYR .= " `INSERT_DT` date  DEFAULT NULL ,  ";
                $SQL_CYR .= " `UPDATE_BY` varchar( 8  )  DEFAULT NULL , ";
                $SQL_CYR .= " `UPDATE_DT` date  DEFAULT NULL , ";
                $SQL_CYR .= " PRIMARY  KEY (  `M_CYCLE_REF_ID`  ) ,  ";
                $SQL_CYR .= " UNIQUE  KEY  `CYCLE` (  `CYCLE`  ) , ";
                $SQL_CYR .= " KEY  `INSERT_BY` (  `INSERT_BY`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1;  ";

                $result = @mysql_query( $SQL_CYR );
                $err_result = mysql_error();

                  if($err_result != ''){
                          echo( "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE M_CYCLE_REF` ".mysql_error());
                          $ret_val = 0;
                  }

                $SQL_CYR = " INSERT INTO $receiver_db.`M_CYCLE_REF` SELECT * FROM $receiver_db.`M_CYCLE_REF_$TODAYS_DATE`; ";

                $result = @mysql_query( $SQL_CYR );
                $err_result = mysql_error();

                    if($err_result != ''){
                          echo( "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE M_CYCLE_REF` ".mysql_error());
                          $ret_val = 0;
                    }else{

                          echo "<br><br> ****fn_Restore_Immediate_Backup : execution: INSERT INTO $receiver_db.`M_CYCLE_REF` SELECT * FROM $receiver_db.`M_CYCLE_REF_$TODAYS_DATE`; complete ";
                    }

              }

           }

        }   //3



         //M_CYCLE_DETAIL    menu connection here


        if($step >= 4){

        $SQL_CHK = "SELECT `M_CYCLE_DETAIL_ID`, `M_CYCLE_REF_ID`  FROM $receiver_db.`M_CYCLE_DETAIL_$TODAYS_DATE` WHERE `M_CYCLE_DETAIL_ID` > 0 AND `M_CYCLE_REF_ID` > 0 ORDER BY `M_CYCLE_DETAIL_ID` DESC  ";

        $result = @mysql_query( $SQL_CHK );
        $err_result = mysql_error();

        if($err_result != ''){

         echo "<br><br>fn_Restore_Immediate_Backup  error on RETRIEVE `M_CYCLE_DETAIL_$TODAYS_DATE`  was NOT created (this can be expected if the script errored out earlier)  ".mysql_error();

        }else{

            //-------------------------------------------//
            // if backup exists - restore from backup :  //
            //-------------------------------------------//

            if(@mysql_num_rows($result)>0){               //   `M_CYCLE_DETAIL_$TODAYS_DATE` exists : can re-create  `M_CYCLE_DETAIL`  //

                     $SQL_CDT = "DROP TABLE IF EXISTS $receiver_db.`M_CYCLE_DETAIL`;  ";
                     $result = @mysql_query( $SQL_CDT );
                     $err_result = mysql_error();

                        if($err_result != ''){
                            echo "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE `M_CYCLE_DETAIL` ".mysql_error();
                            $ret_val = 0;
                        }

                     $SQL_CDT = " CREATE  TABLE  $receiver_db.`M_CYCLE_DETAIL` (  `M_CYCLE_DETAIL_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT , ";
                     $SQL_CDT .= "`M_DAYS_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
                     $SQL_CDT .= "`M_WEEK_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
                     $SQL_CDT .= "`M_CYCLE_REF_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0', ";
                     $SQL_CDT .= "`CYCLE_DETAIL_DATE` int( 10  ) unsigned  DEFAULT NULL , ";
                     $SQL_CDT .= "`INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
                     $SQL_CDT .= "`INSERT_DT` date  DEFAULT NULL , ";
                     $SQL_CDT .= "`UPDATE_BY` varchar( 8  )  DEFAULT NULL , ";
                     $SQL_CDT .= "`UPDATE_DT` date  DEFAULT NULL , ";
                     $SQL_CDT .= "PRIMARY  KEY (  `M_CYCLE_DETAIL_ID`  ) ,  ";
                     $SQL_CDT .= "KEY  `M_CYCLE_DETAIL_FKIndex1` (  `M_CYCLE_REF_ID`  ) , ";
                     $SQL_CDT .= "KEY  `M_CYCLE_DETAIL_FKIndex2` (  `M_WEEK_REF_ID`  ) , ";
                     $SQL_CDT .= "KEY  `M_CYCLE_DETAIL_FKIndex3` (  `M_DAYS_REF_ID`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1; ";

                     $result = @mysql_query( $SQL_CDT );
                     $err_result = mysql_error();

                        if($err_result != ''){
                            echo "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE `M_CYCLE_DETAIL` ".mysql_error();
                            $ret_val = 0;
                        }

                     $SQL_CDT = "INSERT INTO $receiver_db.`M_CYCLE_DETAIL` SELECT * FROM $receiver_db.`M_CYCLE_DETAIL_$TODAYS_DATE`; ";

                     $result = @mysql_query( $SQL_CDT );
                     $err_result = mysql_error();

                       if($err_result != ''){
                            echo "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE `M_CYCLE_DETAIL` ".mysql_error();
                            $ret_val = 0;
                       }else{
                           echo "<br><br> ****fn_Restore_Immediate_Backup : execution: INSERT INTO $receiver_db.`M_CYCLE_DETAIL` SELECT * FROM $receiver_db.`M_CYCLE_DETAIL_$TODAYS_DATE`;  complete ";
                       }
                  }
             }

        } //4


        if($step >= 5){


        $SQL_CHK = "SELECT `M_MENU_ID`, `M_CONSIST_REF_ID`  FROM $receiver_db.`M_MENU_$TODAYS_DATE` WHERE `M_MENU_ID` > 0 AND `M_CONSIST_REF_ID` > 0 ORDER BY `M_MENU_ID` DESC  ";

        $result = @mysql_query( $SQL_CHK );
        $err_result = mysql_error();

        if($err_result != ''){

        echo ("<br><br>fn_Restore_Immediate_Backup  error on RETRIEVE `M_MENU_$TODAYS_DATE`  was NOT created (this can be expected if the script errored out earlier)  ".mysql_error());

        }else{

            //-------------------------------------------//
            // if backup exists - restore from backup :  //
            //-------------------------------------------//

            if(@mysql_num_rows($result)>0){           //   `M_MENU_$TODAYS_DATE` exists : can re-create  `M_MENU`  //


                    $SQL_mnu = "DROP TABLE IF EXISTS $receiver_db.`M_MENU`;   ";
                    $result = @mysql_query( $SQL_mnu );
                    $err_result = mysql_error();

                    if($err_result != ''){
                          echo "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE `M_MENU` ".mysql_error();
                          $ret_val = 0;
                    }

                    $SQL_mnu = "CREATE  TABLE  $receiver_db.`M_MENU` (  `M_MENU_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT ,  ";
                    $SQL_mnu .= "`M_CONSIST_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0',  ";
                    $SQL_mnu .= "`M_CYCLE_DETAIL_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0',  ";
                    $SQL_mnu .= "`M_THERAPEUTIC_DIET_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
                    $SQL_mnu .= "`M_MEAL_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0',  ";
                    $SQL_mnu .= "`NOTES` varchar( 255  )  DEFAULT NULL ,  ";
                    $SQL_mnu .= "`ACTIVE` char( 1  )  DEFAULT NULL , ";
                    $SQL_mnu .= " `INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
                    $SQL_mnu .= "`INSERT_DT` date  DEFAULT NULL ,  ";
                    $SQL_mnu .= " `UPDATE_BY` varchar( 8  )  DEFAULT NULL , ";
                    $SQL_mnu .= "`UPDATE_DT` date  DEFAULT NULL , ";
                    $SQL_mnu .= " PRIMARY  KEY (  `M_MENU_ID`  ) ,  ";
                    $SQL_mnu .= " KEY  `MENU_FKIndex8` (  `M_MEAL_REF_ID`  ) , ";
                    $SQL_mnu .= " KEY  `M_MENU_FKIndex3` (  `M_THERAPEUTIC_DIET_ID`  ) , ";
                    $SQL_mnu .= " KEY  `M_MENU_FKIndex1` (  `M_CYCLE_DETAIL_ID`  ) , ";
                    $SQL_mnu .= "KEY  `M_MENU_FKIndex4` (  `M_CONSIST_REF_ID`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1; ";

                    $result = @mysql_query( $SQL_mnu );
                    $err_result = mysql_error();

                    if($err_result != ''){
                          echo "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE `M_MENU` ".mysql_error();
                          $ret_val = 0;
                    }
                    $SQL_mnu = "INSERT INTO $receiver_db.`M_MENU` SELECT * FROM $receiver_db.`M_MENU_$TODAYS_DATE`;  ";
                    $result = @mysql_query( $SQL_mnu );
                    $err_result = mysql_error();

                    if($err_result != ''){
                          echo "<br><br>fn_Restore_Immediate_Backup :  error on RE-CREATE `M_MENU` ".mysql_error();
                          $ret_val = 0;
                    }else{
                           echo "<br><br> ****fn_Restore_Immediate_Backup : execution: INSERT INTO $receiver_db.`M_MENU` SELECT * FROM $receiver_db.`M_MENU_$TODAYS_DATE`  complete ";
                       }


                }}

        }  //5



        if($step >= 6){


        $SQL_CHK = "SELECT `M_MENU_ITEM_ID`, `M_RECIPE_ID`  FROM $receiver_db.`M_MENU_ITEM_$TODAYS_DATE` WHERE `M_MENU_ITEM_ID` > 0 AND `M_RECIPE_ID` > 0 ORDER BY `M_MENU_ITEM_ID` DESC  ";

        $result = @mysql_query( $SQL_CHK );
        $err_result = mysql_error();

        if($err_result != ''){

        echo ("<br><br> fn_Restore_Immediate_Backup  error on RETRIEVE $receiver_db.`M_MENU_ITEM_$TODAYS_DATE`  was NOT created (this can be expected if the script errored out earlier)  ".mysql_error());

        }else{

            //-------------------------------------------//
            // if backup exists - restore from backup :  //
            //-------------------------------------------//

            if(@mysql_num_rows($result)>0){            //   `M_MENU_ITEM_$TODAYS_DATE` exists : can re-create  `M_MENU_ITEM`  //


                    $SQL_MNI = "DROP TABLE IF EXISTS $receiver_db.`M_MENU_ITEM`; ";
                    $result = @mysql_query( $SQL_MNI );
                    $err_result = mysql_error();

                    if($err_result != ''){
                          echo "<br><br>fn_Restore_Immediate_Backup :  error on re-create `M_MENU_ITEM` ".mysql_error();
                          $ret_val = 0;
                    }


                    $SQL_MNI = "CREATE  TABLE  $receiver_db.`M_MENU_ITEM` (  `M_MENU_ITEM_ID` int( 15  )  unsigned NOT  NULL  AUTO_INCREMENT , ";
                    $SQL_MNI .= "`M_RECIPE_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0', ";
                    $SQL_MNI .= "`M_MENU_ID` int( 15  )  unsigned NOT  NULL DEFAULT  '0', ";
                    $SQL_MNI .= "`M_MEAL_PRIORITY_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0', ";
                    $SQL_MNI .= "`M_MEAL_COMPONENT_REF_ID` int( 10  )  unsigned NOT  NULL DEFAULT  '0',";
                    $SQL_MNI .= "`M_TEXTURE_ID` int( 10  )  NOT  NULL DEFAULT  '0',";
                    $SQL_MNI .= "`LINE_NO` int( 10  ) unsigned  DEFAULT NULL ,";
                    $SQL_MNI .= "`MENU_ITEM_PORTION_SIZE` decimal( 4, 2  )  DEFAULT NULL ,";
                    $SQL_MNI .= "`MENU_ITEM_PORTION_UOM` int( 10  ) unsigned  DEFAULT NULL ,";
                    $SQL_MNI .= " `M_SERVING_UTENSILS_ID` int( 10  ) unsigned  DEFAULT NULL ,";
                    $SQL_MNI .= "`LOCATION` char( 3  )  DEFAULT NULL ,";
                    $SQL_MNI .= "`SERVE` char( 1  )  DEFAULT NULL , ";
                    $SQL_MNI .= "`M_MEAL_COMPONENT_REF_ID_LINKED` int( 10  ) unsigned DEFAULT  '0', ";
                    $SQL_MNI .= "`INSERT_BY` varchar( 8  )  DEFAULT NULL , ";
                    $SQL_MNI .= "`INSERT_DT` date  DEFAULT NULL , ";
                    $SQL_MNI .= "`UPDATE_BY` varchar( 8  )  DEFAULT NULL ,";
                    $SQL_MNI .= " `UPDATE_DT` date  DEFAULT NULL ,";
                    $SQL_MNI .= " PRIMARY  KEY (  `M_MENU_ITEM_ID`  ) ,";
                    $SQL_MNI .= "KEY  `MENU_ITEM_FKIndex1` (  `M_MENU_ID`  ) , ";
                    $SQL_MNI .= "KEY  `MENU_ITEM_FKIndex4` (  `M_MEAL_PRIORITY_REF_ID`  ) ,";
                    $SQL_MNI .= "KEY  `MENU_ITEM_FKIndex5` (  `M_MEAL_COMPONENT_REF_ID`  ) ,";
                    $SQL_MNI .= "KEY  `M_MENU_ITEM_FKIndex6` (  `M_RECIPE_ID`  ) , ";
                    $SQL_MNI .= "KEY  `M_TEXTURE_ID` (  `M_TEXTURE_ID`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1; ";

                    $result = @mysql_query( $SQL_MNI );
                    $err_result = mysql_error();

                    if($err_result != ''){
                          echo "<br><br>fn_Restore_Immediate_Backup :  error on re-create `M_MENU_ITEM` ".mysql_error();
                          $ret_val = 0;
                    }
                    $SQL_MNI = "INSERT INTO $receiver_db.`M_MENU_ITEM` SELECT * FROM $receiver_db.`M_MENU_ITEM_$TODAYS_DATE`;";
                    $result = @mysql_query( $SQL_MNI );
                    $err_result = mysql_error();

                    if($err_result != ''){
                          echo "<br><br>fn_Restore_Immediate_Backup :  error on re-create `M_MENU_ITEM` ".mysql_error();
                          $ret_val = 0;
                    }else{
                           echo "<br><br> ****fn_Restore_Immediate_Backup : execution: INSERT INTO $receiver_db.`M_MENU_ITEM` SELECT * FROM $receiver_db.`M_MENU_ITEM_$TODAYS_DATE`; complete ";
                       }
               }}

         }//6



//-------------------------------------------------------------------------------//

      return ($ret_val);


}




ob_implicit_flush();
echo str_repeat(" ", 256)."<pre>"; flush();

$db_user = "dbadmin";
$db_password = "gator17db";

                                   //-------------------------------------------------------------------------//
$source_db = "menu1";              //   change to source database name which has the menu we want to import   //
$receiver_db = "menu2";            //   change to target database name that will receive this menu            //

$CYCLE_REF_NAME = "Christmas";     //"Christmas";   SNO Fall/Winter 1  //   CHANGE TO CYCLE NAME to be copied                  //
                                   //-------------------------------------------------------------------------//

$TODAYS_DATE  = date('Y-m-d');

$step=0;

set_time_limit(0);


$db = $obv = new clsDBmenu_vendor();

                             //-------------------------------------------------------------------------------------//
$mdb = $obv->DBDatabase;     //this will often be different than the databases we are copying to and from however   //
                             //all databases do and must reside on the same server                                  //
                             //-------------------------------------------------------------------------------------//


//--------------------------------------------------//
//removed since groups are not copied or changed
   ///$obr = new clsDBcentral_recipe();
   ///$rdb = $obr->DBDatabase;
//--------------------------------------------------//



  echo "<br><br><br>Attempting  receiver[".$receiver_db."]  retrieving data from source [".$source_db."]";



if(function_exists('mysql_sno_connect')) {

    echo "<br><br> trying mysql_sno_connect - and using system privileges ... ";

    //$mlk = @mysql_sno_connect($obv->Provider->DBHost, $obv->Provider->DBUser, $obv->Provider->DBPassword);
    $mlk = @mysql_sno_connect($obv->Provider->DBHost, $db_user, $db_password);

}else {

     echo "<br><br> trying mysql_pconnect - and using system privileges ... ";

    //$mlk = @mysql_pconnect($obv->Provider->DBHost, $obv->Provider->DBUser, $obv->Provider->DBPassword);
     $mlk = @mysql_pconnect($obv->Provider->DBHost, $db_user, $db_password);

 }


if (!$mlk) {
   echo("<br><br> link failed ". mysql_error() . " <br><br>");
   exit;
}


$db = @mysql_select_db($receiver_db, $mlk);     //  $receiver_db  can be different than the first one offered by clsdbmenu  //


if (!$db) {

    die("<br><br> menu connection failed receiver_db[" . $receiver_db . "] " . mysql_error() . " <br><br>");

}else{

  echo "<br><br>   " . $receiver_db ." ". $TODAYS_DATE . " step:   " . $step ;

  echo "<br><br>Starting Processing of receiver menu: [".$receiver_db."]  running from menu common file database: [".$mdb."] retrieving data from source [".$source_db."]";


 //does not allow zero to be entered as a value into the primary key



  $SQL = "SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO'; ";
  $result = @mysql_query( $SQL );
  $err_result = mysql_error();


  if($err_result != ''){
          die( "<br><br>  error on setting SQL_MODE : NO_AUTO_VALUE_ON_ZERO ".mysql_error());
    }




 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                          //   check cycle name for prior existence //


 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

     ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



  $sce_M_CYCLE_REF_ID   = '';
  $sce_CYCLE            = '';
  $CYCLE_LENGTH         = '';
  $CYCLE_LENGTH_TYPE    = '';
  $rec_M_CYCLE_REF_ID   = '';
  $rec_CYCLE            = '';


  $rec_M_CYCLE_REF_ID   = '';

//M_CYCLE_REF_ID         CYCLE         CYCLE_LENGTH         CYCLE_LENGTH_TYPE         CYCLE_NOTE         ACTIVE

  $SQL = "SELECT M_CYCLE_REF_ID, CYCLE FROM $receiver_db.M_CYCLE_REF WHERE CYCLE = '$CYCLE_REF_NAME' ORDER BY M_CYCLE_REF_ID DESC; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

  if($err_result != ''){

        die ("<br><br>  error on SELECT FROM `M_CYCLE_REF` ".mysql_error());

  }else{

        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $rec_M_CYCLE_REF_ID = $row['M_CYCLE_REF_ID'];      //SHOULD BE THE LAST ID FROM INSERT//

           $rec_CYCLE =  $row['CYCLE'];

        }
  }


  if($rec_M_CYCLE_REF_ID>0){

       $CYCLE_REF_NAME='';

       die ("<br><br> destination $receiver_db already contains $rec_CYCLE with M_CYCLE_REF_ID[$rec_M_CYCLE_REF_ID]  exiting ... ".mysql_error());

  }








//M_CYCLE_REF_ID         CYCLE         CYCLE_LENGTH         CYCLE_LENGTH_TYPE         CYCLE_NOTE         ACTIVE

  $SQL = "SELECT M_CYCLE_REF_ID, CYCLE, CYCLE_LENGTH, CYCLE_LENGTH_TYPE FROM $source_db.M_CYCLE_REF WHERE CYCLE = '$CYCLE_REF_NAME' ORDER BY M_CYCLE_REF_ID DESC; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

  if($err_result != ''){

        die ("<br><br>  error on SELECT FROM $source_db.M_CYCLE_REF " . mysql_error());

  }else{

     if((@$result) && (mysql_num_rows($result))){

        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {

           $sce_M_CYCLE_REF_ID = $row['M_CYCLE_REF_ID'];      //SHOULD BE THE LAST ID FROM INSERT//

           $sce_CYCLE =  $row['CYCLE'];

           $CYCLE_LENGTH  =   $row['CYCLE_LENGTH'];

           $CYCLE_LENGTH_TYPE    =   $row['CYCLE_LENGTH_TYPE'];

        }

     }else{

           die ("<br><br>  $source_db.M_CYCLE_REF does not exist!  " . mysql_error());
     }

  }



       echo ("<br><br>Source  CYCLE $sce_CYCLE - result[$result]   M_CYCLE_REF_ID[$sce_M_CYCLE_REF_ID] ... ".mysql_error());



 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


                                        //   determine the possible number of cycle days if there are any//


 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



      //========================================================================================================================//
      //---------not related to groups here - just not wanting to save the backup   -----------------------//
      //---------IF processing exits out earlier  -----------------------------------------------------------------------------------//
      //========================================================================================================================//



      $total_days=0;

      $SQLc = "SELECT COUNT(*) AS ROW_CT FROM  $source_db.M_CYCLE_DETAIL  WHERE M_CYCLE_REF_ID = $sce_M_CYCLE_REF_ID  ";

      $resultCT = @mysql_query( $SQLc );
      $err_result = mysql_error();

        if($err_result != ''){

            die ("<br><br>  error on ROW COUNT FROM CYCLE DETAIL <br>$SQLc<br>".mysql_error());

        }else{

            if($rowCT = mysql_fetch_array($resultCT, MYSQL_BOTH))
            {
               $total_days = $rowCT['ROW_CT'];
            }

        }




       if($total_days>0){



                             fn_Optimize_Receiving_Tables( $receiver_db) ;




                     //--------------------------------------------------------------------------//

                          //--something to do when it breaks unexpectably--------------//

                             fn_Save_Backup_by_Date( $receiver_db, $TODAYS_DATE, $obv);

                     //--------------------------------------------------------------------------//


        }else{


              die ("No cycle days from [$source_db.M_CYCLE_DETAIL] available to copy!");


        }


      //========================================================================================================================//

      //========================================================================================================================//




  $step = 1;

  //---------------------------------------------------------------------------------------------------------------------------------------//

  //step 1 and 2 were for groups which are no longer being considered by this script for the green screen design since they always line up //

  //                                                                                                                                       //


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




   //M_GROUP_RECIPE_ID        M_ITEMS_GROUP_REF_ID        SRC_TYPE        M_RECIPE_ID        INSERT_BY        INSERT_DT        UPDATE_BY        UPDATE_DT
   //                1        108        R        1089        NULL        NULL        NULL        NULL
   //                2        108        R        1092        NULL        NULL        NULL        NULL
   //                3        108        R        1188        NULL        NULL        NULL        NULL
   //                4        108        R        1191        NULL        NULL        NULL        NULL


   //check M_GROUP_RECIPE


/*


 */


//on menu database:

//M_CYCLE_REF_ID        CYCLE                   CYCLE_LENGTH         CYCLE_LENGTH_TYPE          CYCLE_NOTE         ACTIVE         INSERT_BY         INSERT_DT         UPDATE_BY         UPDATE_DT
//1                     Spring/Summer 2012      35                   D                          Beaumont            Y               cpoly         2012-03-16         NULL        NULL
//2                     Beaumont Spring 2012    5                    W                          NULL                Y               cpoly         2012-03-19         cpoly         2012-05-01



//blue screen:
    //$SQL =  "INSERT INTO `M_CYCLE_REF` (`M_CYCLE_REF_ID`, `CYCLE`, `START_DATE`, `CYCLE_LENGTH`, `CYCLE_LENGTH_TYPE`, `END_DATE`, `CYCLE_NOTE`, `ACTIVE`, ";
    //$SQL .= "`INSERT_BY`, `INSERT_DT`, `UPDATE_BY`, `UPDATE_DT`) VALUES ";
    //$SQL .= "(NULL, '$CYCLE_REF_NAME', '$START_DATE', 4, 'W', '$END_DATE', NULL, 'Y', 'system', '$TODAYS_DATE', NULL, NULL); ";


//green has no start date:




       //-----------------------//

               $step = 3;

       //-----------------------//


   echo "<br>  step is now [$step] right BEFORE  CYCLE_REF insert ".@mysql_error();


    $SQL =  "INSERT INTO $receiver_db.`M_CYCLE_REF` (`M_CYCLE_REF_ID`, `CYCLE`,  `CYCLE_LENGTH`, `CYCLE_LENGTH_TYPE`, `CYCLE_NOTE`, `ACTIVE`, ";
    $SQL .= "`INSERT_BY`, `INSERT_DT`, `UPDATE_BY`, `UPDATE_DT`) VALUES ";
    $SQL .= "(NULL, '$CYCLE_REF_NAME',  $CYCLE_LENGTH, '$CYCLE_LENGTH_TYPE', NULL, 'Y', 'system', '$TODAYS_DATE', NULL, NULL); ";



  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

  if($err_result != ''){

          //this should rarely fail//
          echo ("<br>  error on INSERT INTO `M_CYCLE_REF` ".mysql_error());

          goto process_error;

    }


   echo "<br><br> Created new cycle ref cycle: ".$CYCLE_REF_NAME;


//OBTAIN THE ID CREATED BY THE INSERT:

$M_CYCLE_REF_ID='';

$SQL = "SELECT M_CYCLE_REF_ID FROM $receiver_db.M_CYCLE_REF WHERE CYCLE = '$CYCLE_REF_NAME' ORDER BY M_CYCLE_REF_ID DESC; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

  if($err_result != ''){

        //this should rarely fail//
        echo ("<br>  error on SELECT FROM `M_CYCLE_REF` ".mysql_error());

        goto process_error;

  }else{
        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $M_CYCLE_REF_ID = $row['M_CYCLE_REF_ID'];      //SHOULD BE THE LAST ID FROM INSERT//

        }
  }


//typical 4 week cycle - change for 6 week or different - manually


   if(!($M_CYCLE_REF_ID > 0)){

      //this should rarely fail//
       echo ("<br>  invalid CYCLE_REF_ID exiting ".mysql_error());

       goto process_error;

      }


      echo "<br> New destination cycle ref cycle: ".$CYCLE_REF_NAME. "  has the NEW id:  ".$M_CYCLE_REF_ID;


$SQL = "SELECT M_CYCLE_DETAIL_ID FROM $receiver_db.M_CYCLE_DETAIL ORDER BY M_CYCLE_DETAIL_ID DESC; ";   //$START_SOURCE_DETAIL_ID//


  $result = @mysql_query( $SQL );
  $err_result = mysql_error();
    if($err_result != ''){

        //this should rarely fail//
        echo ("<br>  error on FIRST SELECT FROM M_CYCLE_DETAIL ".mysql_error());

        goto process_error;

    }else{
        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $STARTING_M_CYCLE_DETAIL_ID = $row['M_CYCLE_DETAIL_ID'];

           $STARTING_M_CYCLE_DETAIL_ID += 1;   //what it will be for be for first addition since table was flushed first//

        }
    }




    echo "<br> following cycle detail ids will start from position $receiver_db STARTING_M_CYCLE_DETAIL_ID: [".$STARTING_M_CYCLE_DETAIL_ID."]  attempting detail insert next: ";




//---------------------------------------------------------------------------------------------//

//    specify insert into M_CYCLE_DETAIL without the M_CYCLE_DETAIL_ID                         //
//    items will start from next available id expected to be the STARTING_M_CYCLE_DETAIL_ID    //
//    we will need these later for the M_MENU insert                                           //

//---------------------------------------------------------------------------------------------//



//on menu database
//M_CYCLE_DETAIL_ID      M_DAYS_REF_ID         M_WEEK_REF_ID         M_CYCLE_REF_ID         CYCLE_DETAIL_DATE         INSERT_BY         INSERT_DT         UPDATE_BY         UPDATE_DT
//92                      7                       5                   4                       35                      sno1                2012-06-13         NULL        NULL
//91                      6                       5                   4                       34                      sno1                2012-06-13         NULL        NULL
//90                      5                       5                   4                       33                      sno1                2012-06-13         NULL        NULL







  //M_CYCLE_DETAIL_ID is missing - autogenerated:
  $SQL = "INSERT INTO $receiver_db.`M_CYCLE_DETAIL` ( `M_DAYS_REF_ID`, `M_WEEK_REF_ID`, `M_CYCLE_REF_ID`, `CYCLE_DETAIL_DATE`, `INSERT_BY`, `INSERT_DT`, `UPDATE_BY`, `UPDATE_DT`) VALUES ";

  $d=0;



  //$total_days is defined at the top and eventually
  //should be a parameter loaded from a picker screen


  if( !( ($total_days > 0) && ($M_CYCLE_REF_ID > 0) && (strlen($TODAYS_DATE)>0) ) ){

        echo ("<br>  invalid CYCLE DATA exiting ".mysql_error());

        goto process_error;

  }


  $SQL_ADD_DAYS = '';

  for ($i=1;$i<=$total_days;$i++){

            if( ( ($i/7) - (intval($i/7))  > 0) )
                $w = intval($i/7) + 1 ;
            else
                $w = intval($i/7) ;

                                         //-----------------------------------------------//
                                         //  $d : 1-7  // $w week // $i all numeric days  //
            $d++;                        //-----------------------------------------------//

            $SQL_ADD_DAYS .= "( $d, $w, $M_CYCLE_REF_ID, $i, 'bmac', '$TODAYS_DATE', NULL, NULL),";

            if($d==7)
               $d=0;
  }

  if(strlen($SQL_ADD_DAYS)) {

     $SQL_ADD_DAYS = substr($SQL_ADD_DAYS,0,strlen($SQL_ADD_DAYS)-1);
     $SQL .= $SQL_ADD_DAYS ;

  }else{

     echo ("<br>  invalid CYCLE INPUT (to be added DETAIL DATA) exiting before insert attempt ".mysql_error());

     goto process_error;

  }


             //----------------------//

                     $step = 4;

             //----------------------//



    echo "<br>  step is now [$step] right before INSERT INTO $receiver_db.`M_CYCLE_DETAIL` ".@mysql_error();



  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

  $ENDING_M_CYCLE_DETAIL_ID='';

    if($err_result != ''){
         //this should rarely fail//
        echo ("<br>  error on INSERT INTO $receiver_db.`M_CYCLE_DETAIL` ".mysql_error());

        goto process_error;


    }else{


              $SQL = "SELECT M_CYCLE_DETAIL_ID FROM $receiver_db.M_CYCLE_DETAIL ORDER BY M_CYCLE_DETAIL_ID DESC; ";

              $result = @mysql_query( $SQL );
              $err_result = mysql_error();
                if($err_result != ''){
                    //this should rarely fail//
                    echo ("<br>  error on LATER $receiver_db SELECT FROM M_CYCLE_DETAIL ".mysql_error());

                    goto process_error;


                }else{
                    if($row = mysql_fetch_array($result, MYSQL_BOTH))
                    {
                       $ENDING_M_CYCLE_DETAIL_ID = $row['M_CYCLE_DETAIL_ID'];

                    }
                }


    }



    if(!($ENDING_M_CYCLE_DETAIL_ID>0)){
          //this should rarely fail//
          echo ("<br>  error on retrieving $receiver_db  ENDING_M_CYCLE_DETAIL_ID [$ENDING_M_CYCLE_DETAIL_ID]  ".mysql_error());

          goto process_error;

     }





     echo "<br> following $receiver_db cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [".$ENDING_M_CYCLE_DETAIL_ID."]";



$SQL = "SELECT M_CYCLE_REF_ID FROM $source_db.M_CYCLE_REF WHERE CYCLE = '$CYCLE_REF_NAME'; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();
    if($err_result != ''){
        //this should rarely fail//
        echo ("<br>  error on SELECT FROM $source_db.`M_CYCLE_REF` ".mysql_error());

        goto process_error;

    }else{

        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $SOURCE_M_CYCLE_REF_ID = $row['M_CYCLE_REF_ID'];      //the INPUT ref table id matching $CYCLE_REF_NAME//

        }
    }


   echo "<br> following SOURCE_M_CYCLE_REF_ID: off $source_db: [".$SOURCE_M_CYCLE_REF_ID."]";


//---------------------------------------------------------------------------------------------------------------------------------------------------------//


//obtain the detail ids matching our source cycle ref--------------------------------------------------------------------------------------------


$SQL = "SELECT M_CYCLE_DETAIL_ID FROM $source_db.M_CYCLE_DETAIL WHERE M_CYCLE_REF_ID = $SOURCE_M_CYCLE_REF_ID ORDER BY M_CYCLE_DETAIL_ID ASC; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();
    if($err_result != ''){

        echo ("<br>  error on FIRST SELECT FROM M_CYCLE_DETAIL ".mysql_error());

        goto process_error;

    }else{
        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $FIRST_SOURCE_M_CYCLE_DETAIL_ID = $row['M_CYCLE_DETAIL_ID'];   //the INPUT ref table DETAIL id matching INPUT $CYCLE_REF_NAME//
        }
    }


//----------------------------------------------------------------------------------------------------------------------------------------------------------//


 $SQL = "SELECT M_CYCLE_DETAIL_ID FROM $source_db.M_CYCLE_DETAIL WHERE M_CYCLE_REF_ID = $SOURCE_M_CYCLE_REF_ID ORDER BY M_CYCLE_DETAIL_ID DESC; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();
    if($err_result != ''){


        echo ("<br>  error on FIRST SELECT FROM M_CYCLE_DETAIL ".mysql_error());

         goto process_error;

    }else{
        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $LAST_SOURCE_M_CYCLE_DETAIL_ID = $row['M_CYCLE_DETAIL_ID'];   //the INPUT ref table DETAIL id matching INPUT $CYCLE_REF_NAME//
        }
    }



  echo "<br> following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [$FIRST_SOURCE_M_CYCLE_DETAIL_ID]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [$LAST_SOURCE_M_CYCLE_DETAIL_ID]  ";



 //if this script ran before sometime - remove M_MENU_FROM_SOURCE_CYCLE //

 $SQL = "  DROP TABLE IF EXISTS $receiver_db.`M_MENU_FROM_SOURCE_CYCLE`  ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

    if($err_result != ''){
        echo "<br>  error on drop table : " . mysql_error()  ;

        $step = 4;
        goto process_error;

    }



  //-------------------------------------------------------------------------------------------------------------------------------
  //    M_MENU_ID         M_CONSIST_REF_ID         M_CYCLE_DETAIL_ID         M_THERAPEUTIC_DIET_ID
  //    M_MEAL_REF_ID         NOTES         ACTIVE         INSERT_BY         INSERT_DT         UPDATE_BY         UPDATE_DT
  //----------------------------------------------------------------------------------------------------------------------------------


  $step = 5;

    echo "<br>  step is now [$step] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO $receiver_db.M_MENU ".@mysql_error();


 $SQL = "DROP TABLE IF EXISTS $receiver_db.`M_MENU_FROM_SOURCE_CYCLE`;  ";


  $result = @mysql_query( $SQL );
  $err_result = mysql_error();



  if($err_result != ''){

        echo ("<br>  error on CREATE  TABLE  `M_MENU_FROM_SOURCE_CYCLE` ".mysql_error());

        goto process_error;

  }

 $SQL = "CREATE TABLE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` ( ";
 $SQL .= " `M_MENU_ID` int(15) unsigned NOT NULL AUTO_INCREMENT, ";
 $SQL .= " `M_CONSIST_REF_ID` int(10) unsigned NOT NULL DEFAULT '0', ";
 $SQL .= " `M_CYCLE_DETAIL_ID` int(15) unsigned NOT NULL DEFAULT '0', ";
 $SQL .= " `M_THERAPEUTIC_DIET_ID` int(10) unsigned NOT NULL DEFAULT '0', ";
 $SQL .= " `M_MEAL_REF_ID` int(10) unsigned NOT NULL DEFAULT '0', ";
 $SQL .= " `NOTES` varchar(255) DEFAULT NULL, ";
 $SQL .= " `ACTIVE` char(1) DEFAULT NULL, ";
 $SQL .= " `INSERT_BY` varchar(8) DEFAULT NULL, ";
 $SQL .= " `INSERT_DT` date DEFAULT NULL, ";
 $SQL .= " `UPDATE_BY` varchar(8) DEFAULT NULL, ";
 $SQL .= " `UPDATE_DT` date DEFAULT NULL,";
 $SQL .= " PRIMARY KEY (`M_MENU_ID`), ";
 $SQL .= "KEY `MENU_FKIndex8` (`M_MEAL_REF_ID`),";
 $SQL .= " KEY `M_MENU_FKIndex3` (`M_THERAPEUTIC_DIET_ID`),";
 $SQL .= " KEY `M_MENU_FKIndex1` (`M_CYCLE_DETAIL_ID`),";
 $SQL .= " KEY `M_MENU_FKIndex4` (`M_CONSIST_REF_ID`) ";
 $SQL .= ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";



  $result = @mysql_query( $SQL );
  $err_result = mysql_error();



  if($err_result != ''){

        echo ("<br>  error on CREATE  TABLE  `M_MENU_FROM_SOURCE_CYCLE` ".mysql_error());

        goto process_error;

  }



   echo "<br><br><br><br> Starting M_MENU_FROM_SOURCE_CYCLE optimizations <br>";

 $SQL1 = "CHECK TABLE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE`;";
 $SQL2 = " ALTER TABLE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` ENGINE = InnoDB; ";
 $SQL3 = "OPTIMIZE TABLE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE`; ";
 $SQL4 = "FLUSH TABLE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE`; ";

        $result = @mysql_query( $SQL1 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL1 ".mysql_error());
        }

        $result = @mysql_query( $SQL2 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL2 ".mysql_error());
        }

        $result = @mysql_query( $SQL3 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL3 ".mysql_error());
        }

        $result = @mysql_query( $SQL4 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL4 ".mysql_error());
        }


  echo "<br> Finished: M_MENU_FROM_SOURCE_CYCLE optimizations ";




  //-----------------------------------------------------------------------------------------------------//
  //    we want to bring in M_MENU_ID off $source_db.M_MENU so we can later change it to match the new ids  //
  //    created when the M_MENU rows are added                                                           //
  //-----------------------------------------------------------------------------------------------------//


  if(!(($FIRST_SOURCE_M_CYCLE_DETAIL_ID>0) && ($LAST_SOURCE_M_CYCLE_DETAIL_ID>0))) {

      echo ("<br> missing detail ids FIRST_SOURCE_M_CYCLE_DETAIL_ID[$FIRST_SOURCE_M_CYCLE_DETAIL_ID] LAST_SOURCE_M_CYCLE_DETAIL_ID[$LAST_SOURCE_M_CYCLE_DETAIL_ID]  ".mysql_error());

      goto process_error;

  }

  //M_MENU_ID,  M_CONSIST_REF_ID,   M_CYCLE_DETAIL_ID,   M_THERAPEUTIC_DIET_ID,   M_MEAL_REF_ID,   NOTES
  //ACTIVE      INSERT_BY           INSERT_DT            UPDATE_BY                UPDATE_DT


  $SQL = "  INSERT INTO $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` ( ";
  $SQL .= "  SELECT M_MENU_ID, M_CONSIST_REF_ID,M_CYCLE_DETAIL_ID,M_THERAPEUTIC_DIET_ID,M_MEAL_REF_ID,NOTES,ACTIVE, ";
  $SQL .= "  INSERT_BY, INSERT_DT,UPDATE_BY,UPDATE_DT FROM $source_db.M_MENU  ";
  $SQL .= "  WHERE M_CYCLE_DETAIL_ID >= $FIRST_SOURCE_M_CYCLE_DETAIL_ID AND M_CYCLE_DETAIL_ID <= $LAST_SOURCE_M_CYCLE_DETAIL_ID ) ";       // this is assuming the cycle is the last cycle created and updated   tsts dta: WHERE M_CYCLE_DETAIL_ID > 10000534 ) ";



  $result = @mysql_query( $SQL );
  $err_result = mysql_error();



  if($err_result != ''){

        echo ("<br>  error on INSERT INTO $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` " . $SQL . "<BR>" . mysql_error());

        goto process_error;

    }



  echo "<br> $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  $source_db.M_MENU  ";



  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //                                                                                                                                      //
  //   Although the M_MENU_ID will not be used for the final insert  into the destination M_MENU table                                    //
  //                                                                                                                                      //
  //         M_MENU_ID is still necessary in order to form a proper query against the M_MENU_ITEM table later on                          //
  //         ensuring that only the rows we want from M_MENU_ITEM are brought over from the source cycle                                  //
  //                                                                                                                                      //
  //                                                                                                                                      //
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


  $FIRST_SOURCE_M_MENU_ID = '';

  $SQL = "SELECT M_MENU_ID FROM $receiver_db.`M_MENU_FROM_SOURCE_CYCLE`  ORDER BY M_MENU_ID ASC; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();


  if($err_result != ''){

        echo ("<br>  error on FIRST_SOURCE_M_MENU_ID ".mysql_error());

          goto process_error;

    }else{

        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $FIRST_SOURCE_M_MENU_ID = $row['M_MENU_ID'];
        }                                            //the corp menu or 740 INPUT first M_MENU_ID  $FIRST_SOURCE_M_MENU_ID

    }


    if(!($FIRST_SOURCE_M_MENU_ID>0))  {

          echo ("<br>  error on obtaining FIRST_SOURCE_M_MENU_ID ".mysql_error());

          goto process_error;

    }


  echo "<br>SELECT M_MENU_ID FROM $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [$FIRST_SOURCE_M_MENU_ID] ";


//----------------------------------------------------------------------------------------------------------------------------------------------------------//


 $LAST_SOURCE_M_MENU_ID = '';

 $SQL = "SELECT M_MENU_ID FROM $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; ";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();
    if($err_result != ''){

          echo ("<br>  error on LAST_SOURCE_M_MENU_ID ".mysql_error());

          goto process_error;

    }else{
        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $LAST_SOURCE_M_MENU_ID = $row['M_MENU_ID'];   //the INPUT last $M_MENU_ID
        }
    }

      if(!($LAST_SOURCE_M_MENU_ID>0)){

             echo ("<br>  error on obtaining LAST_SOURCE_M_MENU_ID ".mysql_error());

             goto process_error;

         }


    echo "<br>SELECT M_MENU_ID FROM $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [$LAST_SOURCE_M_MENU_ID] ";


 //------------------------------------------------------------------------------------------------------------------------------------------


  // it is expected that M_CYCLE_DETAIL_ID from the insert above will NOT line up with this database menuXXX
  //  update  M_CYCLE_DETAIL_ID   FROM `M_MENU_FROM_SOURCE_CYCLE  to line up with this database


      //EXAMPLE :  STARTING from our destination table IS 20000016
      //           FIRST is from our source table IS      20000916
      //   we need to make the source table (from740) becomes 20000016 :  to do that apply a change value in this case: -900  from $CHG_M_CYCLE_DETAIL_ID

      //in order to make :  M_MENU_FROM_SOURCE_CYCLE have the right CYCLE_DETAIL_ID,  they need to match
      //                    the ids we created in M_CYCLE_DETAIL
      //      one quick way to do that is apply an update statement changing all the detail ids to incrementally match  with  $CHG_M_CYCLE_DETAIL_ID


 //-----------------------------------------------------------------------------------------------------------------------------------------------


  $CHG_M_CYCLE_DETAIL_ID='';

  if(($STARTING_M_CYCLE_DETAIL_ID>0) && ($FIRST_SOURCE_M_CYCLE_DETAIL_ID>0)){
      $CHG_M_CYCLE_DETAIL_ID =  $STARTING_M_CYCLE_DETAIL_ID - $FIRST_SOURCE_M_CYCLE_DETAIL_ID;

      echo "<br> STARTING_M_CYCLE_DETAIL_ID[$STARTING_M_CYCLE_DETAIL_ID] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[$FIRST_SOURCE_M_CYCLE_DETAIL_ID]  determines  CHG_M_CYCLE_DETAIL_ID : [$CHG_M_CYCLE_DETAIL_ID] to be used in update statement next ... ";


  }else{

        echo ("<br>  unable to determine CHG_M_CYCLE_DETAIL_ID :  [$CHG_M_CYCLE_DETAIL_ID] ".mysql_error());

        goto process_error;
  }


 //the Id needed from this database not 740:  $STARTING_M_CYCLE_DETAIL_ID

 $SQL ="  UPDATE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` SET M_CYCLE_DETAIL_ID = M_CYCLE_DETAIL_ID + $CHG_M_CYCLE_DETAIL_ID; ";


 $result = @mysql_query( $SQL );
  $err_result = mysql_error();

    if($err_result != ''){

        echo ("<br>  error on UPDATE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` SET M_CYCLE_DETAIL_ID  ".mysql_error());

        goto process_error;

    }





 $STARTING_M_MENU_ID='';

 $SQL = "SELECT M_MENU_ID FROM $receiver_db.M_MENU ORDER BY M_MENU_ID DESC ";

  $result = @mysql_query( $SQL );

  $err_result = mysql_error();

    if($err_result != ''){

        echo ("<br>  error on RETRIEVE M_MENU_ID ".mysql_error());

        goto process_error;

    }else{
        if($row = mysql_fetch_array($result, MYSQL_BOTH))
        {
           $STARTING_M_MENU_ID = $row['M_MENU_ID'];   //the INPUT ref table DETAIL id matching INPUT $CYCLE_REF_NAME//

           $STARTING_M_MENU_ID +=1;

        }
    }

   if(!($STARTING_M_MENU_ID>0)) {

      echo ("<br>  error on saving start $receiver_db.M_MENU_ID: [$STARTING_M_MENU_ID] ".mysql_error());

      goto process_error;

    }



    echo "<br> SELECT M_MENU_ID FROM $receiver_db.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [$STARTING_M_MENU_ID] ";




 if(($STARTING_M_MENU_ID>0)&&($FIRST_SOURCE_M_MENU_ID>0)){
       $CHG_M_MENU_ID =  $STARTING_M_MENU_ID - $FIRST_SOURCE_M_MENU_ID;

       echo "<br>calculated change: CHG_M_MENU_ID:  [$CHG_M_MENU_ID] =  STARTING_M_MENU_ID[$STARTING_M_MENU_ID] - FIRST_SOURCE_M_MENU_ID[$FIRST_SOURCE_M_MENU_ID]  ";

  }else{

       echo "<br>  unable to determine CHG_M_MENU_ID : from  STARTING_M_MENU_ID:[$STARTING_M_MENU_ID] - FIRST_SOURCE_M_MENU_ID[$FIRST_SOURCE_M_MENU_ID] ".mysql_error();

       goto process_error;
  }




 $SQL =" UPDATE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + $CHG_M_MENU_ID; ";

 echo "***executed : UPDATE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + $CHG_M_MENU_ID; ::: ***************** ";

 $result = @mysql_query( $SQL );
 $err_result = mysql_error();

 if($err_result != ''){

        echo "<br>  error on UPDATE $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID sql: <br> $SQL -- ".mysql_error();

        goto process_error;

 }




 //---------------------------------------------------------------------------------------------//
  //now when we move the M_MENU_FROM_SOURCE_CYCLE into M_MENU the cycle detail ids will line up
 //---------------------------------------------------------------------------------------------//


 //JUST BEFORE INSERTING INTO `M_MENU` make sure ids increment as expected and optimize table//

 /*


 */
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //-------------------------------------------------------------------------------------------------------------------//
 //BEFORE INSERTING NEW ROWS INTO THE DESTINATION M_MENU save the first id  M_MENU_ID AS  STARTING_M_MENU_ID

 //STARTING_M_MENU_ID is needed later to re-increment the M_MENU_ID column inside the M_MENU_ITEM table that will
 //be brought into  `M_MENU_ITEM_FROM_SOURCE_CYCLE`
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   //------------------------------------------------------------------------------------------------------//


    $SQL = " INSERT INTO $receiver_db.M_MENU ( ";
  //  $SQL .= "SELECT NULL,  M_CONSIST_REF_ID, M_CYCLE_DETAIL_ID, M_THERAPEUTIC_DIET_ID, M_MEAL_REF_ID, NOTES, ACTIVE,  ";

    $SQL .= "SELECT M_MENU_ID,  M_CONSIST_REF_ID, M_CYCLE_DETAIL_ID, M_THERAPEUTIC_DIET_ID, M_MEAL_REF_ID, NOTES, ACTIVE,  ";
    $SQL .= "INSERT_BY,  INSERT_DT,  UPDATE_BY,  UPDATE_DT   ";
    $SQL .= "FROM $receiver_db.`M_MENU_FROM_SOURCE_CYCLE` )  ";


    $result = @mysql_query( $SQL );
    $err_result = mysql_error();

    if($err_result != ''){

        echo "<br>  error on INSERT INTO `M_MENU` ".mysql_error();

        goto process_error;
    }



 //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//







   //if this script ran before sometime - remove M_MENU_FROM_SOURCE_CYCLE //

 $SQL = " DROP TABLE IF EXISTS $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE`";

  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

    if($err_result != ''){

        echo "<br>  error on drop table $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE  " . mysql_error()  ;

        goto process_error;
    }


 //current columns:
//  M_MENU_ITEM_ID         M_RECIPE_ID         M_MENU_ID         M_MEAL_PRIORITY_REF_ID         M_MEAL_COMPONENT_REF_ID
//  M_TEXTURE_ID         LINE_NO         MENU_ITEM_PORTION_SIZE         MENU_ITEM_PORTION_UOM         M_SERVING_UTENSILS_ID
//  LOCATION         SERVE         M_MEAL_COMPONENT_REF_ID_LINKED         INSERT_BY         INSERT_DT         UPDATE_BY         UPDATE_DT

/*

Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-04 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE Christmas - result[Resource id #14]   M_CYCLE_REF_ID[3] ...
  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: Christmas
 New destination cycle ref cycle: Christmas  has the NEW id:  9
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [151]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [151]
 following SOURCE_M_CYCLE_REF_ID: off corp_menu or 740: [3]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [57]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [57]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [94249]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [95931]
 STARTING_M_CYCLE_DETAIL_ID[151] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[57]  determines  CHG_M_CYCLE_DETAIL_ID : [94] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [252451]

******************* menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE has been populated from the menu1.Christmas using ids : M_MENU_ID >= FIRST_SOURCE_M_MENU_ID[94249]  AND M_MENU_ID <= LAST_SOURCE_M_MENU_ID[95931] with sql
  INSERT INTO menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` (   SELECT NULL,M_RECIPE_ID,  M_MENU_ID,  M_MEAL_PRIORITY_REF_ID, M_MEAL_COMPONENT_REF_ID, M_TEXTURE_ID,   LINE_NO, MENU_ITEM_PORTION_SIZE,  MENU_ITEM_PORTION_UOM, M_SERVING_UTENSILS_ID, LOCATION,SERVE, M_MEAL_COMPONENT_REF_ID_LINKED,   INSERT_BY, INSERT_DT, UPDATE_BY, UPDATE_DT FROM menu1.M_MENU_ITEM    WHERE M_MENU_ID >= 94249 AND M_MENU_ID <= 95931 )

calculated change: CHG_M_MENU_ID:  [158202] =  STARTING_M_MENU_ID[252451] - FIRST_SOURCE_M_MENU_ID[94249]
calculated change: CHG_M_MENU_ID:  [158202] =  STARTING_M_MENU_ID[252451] - FIRST_SOURCE_M_MENU_ID[94249]  *****************just ran :::: UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 158202; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [Christmas] from menu1.Christmas should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************
 */

 $SQL = "DROP TABLE IF EXISTS $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE`;  ";


  $result = @mysql_query( $SQL );
  $err_result = mysql_error();



  if($err_result != ''){

        echo ("<br>  error on DROP TABLE `M_MENU_FROM_SOURCE_CYCLE` ".mysql_error());

        goto process_error;

  }


 $SQL = " CREATE TABLE  $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` (  ";
 $SQL .= " `M_MENU_ITEM_ID` int(15) unsigned NOT NULL AUTO_INCREMENT,";
 $SQL .= " `M_RECIPE_ID` int(15) unsigned NOT NULL DEFAULT '0', ";
 $SQL .= " `M_MENU_ID` int(15) unsigned NOT NULL DEFAULT '0', ";
 $SQL .= " `M_MEAL_PRIORITY_REF_ID` int(10) unsigned NOT NULL DEFAULT '0',";
 $SQL .= " `M_MEAL_COMPONENT_REF_ID` int(10) unsigned NOT NULL DEFAULT '0',";
 $SQL .= " `M_TEXTURE_ID` int(10) NOT NULL DEFAULT '0',";
 $SQL .= " `LINE_NO` int(10) unsigned DEFAULT NULL,";
 $SQL .= " `MENU_ITEM_PORTION_SIZE` decimal(4,2) DEFAULT NULL,";
 $SQL .= " `MENU_ITEM_PORTION_UOM` int(10) unsigned DEFAULT NULL,";
 $SQL .= " `M_SERVING_UTENSILS_ID` int(10) unsigned DEFAULT NULL,";
 $SQL .= " `LOCATION` char(3) DEFAULT NULL,";
 $SQL .= " `SERVE` char(1) DEFAULT NULL,";
 $SQL .= " `M_MEAL_COMPONENT_REF_ID_LINKED` int(10) unsigned DEFAULT '0',";
 $SQL .= " `INSERT_BY` varchar(8) DEFAULT NULL,";
 $SQL .= " `INSERT_DT` date DEFAULT NULL,";
 $SQL .= " `UPDATE_BY` varchar(8) DEFAULT NULL,";
 $SQL .= " `UPDATE_DT` date DEFAULT NULL,";
 $SQL .= " PRIMARY KEY (`M_MENU_ITEM_ID`),";
 $SQL .= " KEY `MENU_ITEM_FKIndex1` (`M_MENU_ID`),";
 $SQL .= " KEY `MENU_ITEM_FKIndex4` (`M_MEAL_PRIORITY_REF_ID`),";
 $SQL .= " KEY `MENU_ITEM_FKIndex5` (`M_MEAL_COMPONENT_REF_ID`),";
 $SQL .= " KEY `M_MENU_ITEM_FKIndex6` (`M_RECIPE_ID`),";
 $SQL .= " KEY `M_TEXTURE_ID` (`M_TEXTURE_ID`) ";
 $SQL .= ") ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";



  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

    if($err_result != ''){

       echo "<br>  error on CREATE  TABLE  $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` ".mysql_error();

       goto process_error;
    }





   echo "<br><br><br><br> Starting M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations <br>";

 $SQL1 = "CHECK TABLE $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE`;";
 $SQL2 = " ALTER TABLE $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` ENGINE = InnoDB; ";
 $SQL3 = "OPTIMIZE TABLE $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE`; ";
 $SQL4 = "FLUSH TABLE $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE`; ";

        $result = @mysql_query( $SQL1 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL1 ".mysql_error());
        }

        $result = @mysql_query( $SQL2 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL2 ".mysql_error());
        }

        $result = @mysql_query( $SQL3 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL3 ".mysql_error());
        }

        $result = @mysql_query( $SQL4 );
        $err_result = mysql_error();
        if($err_result != ''){
        die ("<br>  error on $SQL4 ".mysql_error());
        }


  echo "<br> Finished: M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations ";



//TEST DATA FROM SOURCE TABLE IN $source_db
//M_MENU_ITEM_ID  M_RECIPE_ID M_TEXTURE_RECIPE_ID M_THERAPEUTIC_DIET_RECIPE_ID M_MENU_ID  M_MEAL_PRIORITY_REF_ID         M_MEAL_COMPONENT_REF_ID          LINE_NO         MENU_ITEM_PORTION_SIZE          MENU_ITEM_PORTION_UOM           M_SERVING_UTENSILS_ID           LOCATION            SERVE           M_MEAL_COMPONENT_REF_ID_LINKED         INSERT_BY         INSERT_DT         UPDATE_BY         UPDATE_DT
//13590098        1390        685                 3458                         10894385   1                               13                              NULL            NULL                            NULL                            NULL                            NULL                NULL            0                                       pbohlen         2012-07-18         NULL         NULL


//A NEW SET OF M_MENU_ID numbers were created from the insert into M_MENU
//
//we need to make these M_MENU_IDs INSIDE THE `M_MENU_ITEM_FROM_SOURCE_CYCLE` match the ones we just created in the destination table



 //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//



  $SQL = "  INSERT INTO $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` ( ";

  $SQL .= "  SELECT NULL,M_RECIPE_ID,  M_MENU_ID,  M_MEAL_PRIORITY_REF_ID, M_MEAL_COMPONENT_REF_ID, M_TEXTURE_ID, ";
  $SQL .= "  LINE_NO, MENU_ITEM_PORTION_SIZE,  MENU_ITEM_PORTION_UOM, M_SERVING_UTENSILS_ID, LOCATION,SERVE, M_MEAL_COMPONENT_REF_ID_LINKED, ";
  $SQL .= "  INSERT_BY, INSERT_DT, UPDATE_BY, UPDATE_DT FROM $source_db.M_MENU_ITEM  ";

  $SQL .= "  WHERE M_MENU_ID >= $FIRST_SOURCE_M_MENU_ID AND M_MENU_ID <= $LAST_SOURCE_M_MENU_ID ) ";   // this is assuming the cycle is the last cycle created and updated   tsts dta: WHERE M_CYCLE_DETAIL_ID > 10000534 ) ";

 //now the M_MENU_IDs are the ones from the source table  they will need to be incremented to match the ones from our destination menu


  $result = @mysql_query( $SQL );
  $err_result = mysql_error();

    if($err_result != ''){

        echo "<br>  error on INSERT INTO `M_MENU_ITEM_FROM_SOURCE_CYCLE` with sql: <Br>  $SQL  --  ".mysql_error();

        goto process_error;

    }





 //--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

 /*
   //moved up for m_menu
   echo "<br><br>******************* $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE has been populated from the $source_db.$CYCLE_REF_NAME using ids : M_MENU_ID >= FIRST_SOURCE_M_MENU_ID[$FIRST_SOURCE_M_MENU_ID]  AND M_MENU_ID <= LAST_SOURCE_M_MENU_ID[$LAST_SOURCE_M_MENU_ID] with sql <br>".$SQL."<br>";



  if(($STARTING_M_MENU_ID>0)&&($FIRST_SOURCE_M_MENU_ID>0)){
       $CHG_M_MENU_ID =  $STARTING_M_MENU_ID - $FIRST_SOURCE_M_MENU_ID;

       echo "<br>calculated change: CHG_M_MENU_ID:  [$CHG_M_MENU_ID] =  STARTING_M_MENU_ID[$STARTING_M_MENU_ID] - FIRST_SOURCE_M_MENU_ID[$FIRST_SOURCE_M_MENU_ID]  ";

  }else{

       echo "<br>  unable to determine CHG_M_MENU_ID : from  STARTING_M_MENU_ID:[$STARTING_M_MENU_ID] - FIRST_SOURCE_M_MENU_ID[$FIRST_SOURCE_M_MENU_ID] ".mysql_error();

       goto process_error;
  }
 */

 //the Id needed from this database not 740:  $STARTING_M_CYCLE_DETAIL_ID



 $SQL =" UPDATE $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + $CHG_M_MENU_ID; ";

 echo "***executed : UPDATE $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + $CHG_M_MENU_ID; ::: ***************** ";

 $result = @mysql_query( $SQL );
 $err_result = mysql_error();

 if($err_result != ''){

        echo "<br>  error on UPDATE $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID sql: <br> $SQL -- ".mysql_error();

        goto process_error;

 }




//now the M_MENU_IDs from the source table have been changed to match the destination table; bring them over with the last  //
//and most massive insert of all                                                                                            //


  $step = 6;


  echo "<br>  step is now [$step] just before INSERT INTO $receiver_db.`M_MENU_ITEM` ".@mysql_error();

  echo "<br> starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ... ";


  $SQL = "  INSERT INTO $receiver_db.`M_MENU_ITEM` ( ";
  $SQL .= "  SELECT NULL,M_RECIPE_ID,  M_MENU_ID,  M_MEAL_PRIORITY_REF_ID, M_MEAL_COMPONENT_REF_ID, M_TEXTURE_ID, ";
  $SQL .= "  LINE_NO, MENU_ITEM_PORTION_SIZE,  MENU_ITEM_PORTION_UOM, M_SERVING_UTENSILS_ID, LOCATION,SERVE, M_MEAL_COMPONENT_REF_ID_LINKED, ";
  $SQL .= "  INSERT_BY, INSERT_DT, UPDATE_BY, UPDATE_DT FROM $receiver_db.`M_MENU_ITEM_FROM_SOURCE_CYCLE` ) ";


  $result = @mysql_query( $SQL );
  $err_result = mysql_error();



    if($err_result != ''){

        echo "<br>  error on INSERT INTO `M_MENU_ITEM` FROM `M_MENU_ITEM_FROM_SOURCE_CYCLE` ".mysql_error();

        goto process_error;
    }




  echo "<br> Process complete.  Cycle: [$CYCLE_REF_NAME] from $source_db.$CYCLE_REF_NAME should be TRANSFERRED and functional on site: [$receiver_db]";

  echo "<br> *******************script completed with no errors*************************";



}



  exit;



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



   process_error:


    echo "<br>*** entered error block trying : fn_Restore_Immediate_Backup at step: [$step]  passing  receiver_db[$receiver_db] TODAYS_DATE[$TODAYS_DATE] ...  ";

   //move dated tables back over as originals//

   if(fn_Restore_Immediate_Backup( $receiver_db,$TODAYS_DATE, $obv, $step)){

        echo "<br> script completed but with errors and all database tables have been restored";

   }else{

         echo "<br> script completed but with errors and restoral was not successful ";

   }

  /*//////////////////////////////////   test output   /////////////////////////////////////////////////////////////////////

 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
          //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
           //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
             //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
              //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
               //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                 //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

******************* START **********CYCLE IMPORT FROM CORP SITE***************


debug output:

Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-05 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE SNO Fall/Winter 1 - result[Resource id #14]   M_CYCLE_REF_ID[1] ...



 Starting M_CYCLE_REF optimizations

 Finished: M_CYCLE_REF optimizations
 Starting M_CYCLE_DETAIL optimizations
 Finished: M_CYCLE_DETAIL optimizations
 optimizing `M_MENU`
 optimize `M_MENU` complete
 optimizing `M_MENU_ITEM`
`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------


  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: SNO Fall/Winter 1
 New destination cycle ref cycle: SNO Fall/Winter 1  has the NEW id:  8
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [123]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [150]
 following SOURCE_M_CYCLE_REF_ID: off menu1: [1]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [1]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [28]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [1]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [47124]
 STARTING_M_CYCLE_DETAIL_ID[123] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[1]  determines  CHG_M_CYCLE_DETAIL_ID : [122] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [205327]

******************* menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE has been populated from the menu1.SNO Fall/Winter 1 using ids : M_MENU_ID >= FIRST_SOURCE_M_MENU_ID[1]  AND M_MENU_ID <= LAST_SOURCE_M_MENU_ID[47124] with sql
  INSERT INTO menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` (   SELECT NULL,M_RECIPE_ID,  M_MENU_ID,  M_MEAL_PRIORITY_REF_ID, M_MEAL_COMPONENT_REF_ID, M_TEXTURE_ID,   LINE_NO, MENU_ITEM_PORTION_SIZE,  MENU_ITEM_PORTION_UOM, M_SERVING_UTENSILS_ID, LOCATION,SERVE, M_MEAL_COMPONENT_REF_ID_LINKED,   INSERT_BY, INSERT_DT, UPDATE_BY, UPDATE_DT FROM menu1.M_MENU_ITEM    WHERE M_MENU_ID >= 1 AND M_MENU_ID <= 47124 )

calculated change: CHG_M_MENU_ID:  [205326] =  STARTING_M_MENU_ID[205327] - FIRST_SOURCE_M_MENU_ID[1]  ***executed : UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 205326; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [SNO Fall/Winter 1] from menu1.SNO Fall/Winter 1 should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************




















******************* START **********CYCLE IMPORT FROM CORP SITE***************




Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-05 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE Christmas - result[Resource id #14]   M_CYCLE_REF_ID[3] ...



 Starting M_CYCLE_REF optimizations

 Finished: M_CYCLE_REF optimizations
 Starting M_CYCLE_DETAIL optimizations
 Finished: M_CYCLE_DETAIL optimizations
 optimizing `M_MENU`
 optimize `M_MENU` complete
 optimizing `M_MENU_ITEM`
`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------


  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: Christmas
 New destination cycle ref cycle: Christmas  has the NEW id:  9
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [151]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [151]
 following SOURCE_M_CYCLE_REF_ID: off menu1: [3]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [57]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [57]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [94249]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [95931]
 STARTING_M_CYCLE_DETAIL_ID[151] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[57]  determines  CHG_M_CYCLE_DETAIL_ID : [94] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [252451]

******************* menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE has been populated from the menu1.Christmas using ids : M_MENU_ID >= FIRST_SOURCE_M_MENU_ID[94249]  AND M_MENU_ID <= LAST_SOURCE_M_MENU_ID[95931] with sql
  INSERT INTO menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` (   SELECT NULL,M_RECIPE_ID,  M_MENU_ID,  M_MEAL_PRIORITY_REF_ID, M_MEAL_COMPONENT_REF_ID, M_TEXTURE_ID,   LINE_NO, MENU_ITEM_PORTION_SIZE,  MENU_ITEM_PORTION_UOM, M_SERVING_UTENSILS_ID, LOCATION,SERVE, M_MEAL_COMPONENT_REF_ID_LINKED,   INSERT_BY, INSERT_DT, UPDATE_BY, UPDATE_DT FROM menu1.M_MENU_ITEM    WHERE M_MENU_ID >= 94249 AND M_MENU_ID <= 95931 )

calculated change: CHG_M_MENU_ID:  [158202] =  STARTING_M_MENU_ID[252451] - FIRST_SOURCE_M_MENU_ID[94249]  ***executed : UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 158202; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [Christmas] from menu1.Christmas should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************

























 ******************* START **********CYCLE IMPORT FROM CORP SITE***************




Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-05 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE SNO Fall/Winter 1 - result[Resource id #14]   M_CYCLE_REF_ID[1] ...



 Starting M_CYCLE_REF optimizations

 Finished: M_CYCLE_REF optimizations
 Starting M_CYCLE_DETAIL optimizations
 Finished: M_CYCLE_DETAIL optimizations
 optimizing `M_MENU`
 optimize `M_MENU` complete
 optimizing `M_MENU_ITEM`
`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------


  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: SNO Fall/Winter 1
 New destination cycle ref cycle: SNO Fall/Winter 1  has the NEW id:  8
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [123]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [150]
 following SOURCE_M_CYCLE_REF_ID: off menu1: [1]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [1]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [28]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [1]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [47124]
 STARTING_M_CYCLE_DETAIL_ID[123] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[1]  determines  CHG_M_CYCLE_DETAIL_ID : [122] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [205327]
calculated change: CHG_M_MENU_ID:  [205326] =  STARTING_M_MENU_ID[205327] - FIRST_SOURCE_M_MENU_ID[1]  ***executed : UPDATE menu2.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 205326; ::: ***************** ***executed : UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 205326; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [SNO Fall/Winter 1] from menu1.SNO Fall/Winter 1 should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************













  ******************* START **********CYCLE IMPORT FROM CORP SITE***************




Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-05 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE Christmas - result[Resource id #14]   M_CYCLE_REF_ID[3] ...



 Starting M_CYCLE_REF optimizations

 Finished: M_CYCLE_REF optimizations
 Starting M_CYCLE_DETAIL optimizations
 Finished: M_CYCLE_DETAIL optimizations
 optimizing `M_MENU`
 optimize `M_MENU` complete
 optimizing `M_MENU_ITEM`
`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------


  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: Christmas
 New destination cycle ref cycle: Christmas  has the NEW id:  9
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [151]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [151]
 following SOURCE_M_CYCLE_REF_ID: off menu1: [3]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [57]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [57]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [94249]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [95931]
 STARTING_M_CYCLE_DETAIL_ID[151] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[57]  determines  CHG_M_CYCLE_DETAIL_ID : [94] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [252451]
calculated change: CHG_M_MENU_ID:  [158202] =  STARTING_M_MENU_ID[252451] - FIRST_SOURCE_M_MENU_ID[94249]  ***executed : UPDATE menu2.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 158202; ::: ***************** ***executed : UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 158202; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [Christmas] from menu1.Christmas should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************







******************* START **********CYCLE IMPORT FROM CORP SITE***************




Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-05 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE SNO Fall/Winter 1 - result[Resource id #14]   M_CYCLE_REF_ID[1] ...



 Starting M_CYCLE_REF optimizations

 Finished: M_CYCLE_REF optimizations
 Starting M_CYCLE_DETAIL optimizations
 Finished: M_CYCLE_DETAIL optimizations
 optimizing `M_MENU`
 optimize `M_MENU` complete
 optimizing `M_MENU_ITEM`
`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------


  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: SNO Fall/Winter 1
 New destination cycle ref cycle: SNO Fall/Winter 1  has the NEW id:  8
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [123]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [150]
 following SOURCE_M_CYCLE_REF_ID: off menu1: [1]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [1]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [28]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU



 Starting M_MENU_FROM_SOURCE_CYCLE optimizations

 Finished: M_MENU_FROM_SOURCE_CYCLE optimizations
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [1]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [47124]
 STARTING_M_CYCLE_DETAIL_ID[123] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[1]  determines  CHG_M_CYCLE_DETAIL_ID : [122] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [205327]
calculated change: CHG_M_MENU_ID:  [205326] =  STARTING_M_MENU_ID[205327] - FIRST_SOURCE_M_MENU_ID[1]  ***executed : UPDATE menu2.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 205326; ::: *****************



 Starting M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations

 Finished: M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations ***executed : UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 205326; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [SNO Fall/Winter 1] from menu1.SNO Fall/Winter 1 should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************
























******************* START **********CYCLE IMPORT FROM CORP SITE***************




Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-05 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE SNO Fall/Winter 1 - result[Resource id #14]   M_CYCLE_REF_ID[1] ...



 Starting M_CYCLE_REF optimizations

 Finished: M_CYCLE_REF optimizations
 Starting M_CYCLE_DETAIL optimizations
 Finished: M_CYCLE_DETAIL optimizations
 optimizing `M_MENU`
 optimize `M_MENU` complete
 optimizing `M_MENU_ITEM`
`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------


  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: SNO Fall/Winter 1
 New destination cycle ref cycle: SNO Fall/Winter 1  has the NEW id:  8
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [123]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [150]
 following SOURCE_M_CYCLE_REF_ID: off menu1: [1]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [1]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [28]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU



 Starting M_MENU_FROM_SOURCE_CYCLE optimizations

 Finished: M_MENU_FROM_SOURCE_CYCLE optimizations
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [1]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [47124]
 STARTING_M_CYCLE_DETAIL_ID[123] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[1]  determines  CHG_M_CYCLE_DETAIL_ID : [122] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [205327]
calculated change: CHG_M_MENU_ID:  [205326] =  STARTING_M_MENU_ID[205327] - FIRST_SOURCE_M_MENU_ID[1]  ***executed : UPDATE menu2.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 205326; ::: *****************



 Starting M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations

 Finished: M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations ***executed : UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 205326; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [SNO Fall/Winter 1] from menu1.SNO Fall/Winter 1 should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************























******************* START **********CYCLE IMPORT FROM CORP SITE***************




Attempting  receiver[menu2]  retrieving data from source [menu1]

 trying mysql_sno_connect - and using system privileges ...

   menu2 2012-09-05 step:   0

Starting Processing of receiver menu: [menu2]  running from menu common file database: [menu2] retrieving data from source [menu1]

Source  CYCLE Christmas - result[Resource id #14]   M_CYCLE_REF_ID[3] ...



 Starting M_CYCLE_REF optimizations

 Finished: M_CYCLE_REF optimizations
 Starting M_CYCLE_DETAIL optimizations
 Finished: M_CYCLE_DETAIL optimizations
 optimizing `M_MENU`
 optimize `M_MENU` complete
 optimizing `M_MENU_ITEM`
`M_MENU_ITEM` complete ----- All optimizations COMPLETE ------


  step is now [3] right BEFORE  CYCLE_REF insert

 Created new cycle ref cycle: Christmas
 New destination cycle ref cycle: Christmas  has the NEW id:  9
 following cycle detail ids will start from position menu2 STARTING_M_CYCLE_DETAIL_ID: [151]  attempting detail insert next:
  step is now [4] right before INSERT INTO menu2.`M_CYCLE_DETAIL`
 following menu2 cycle detail ids will end at position ENDING_M_CYCLE_DETAIL_ID: [151]
 following SOURCE_M_CYCLE_REF_ID: off menu1: [3]
 following FIRST_SOURCE_M_CYCLE_DETAIL_ID: [57]  LAST_SOURCE_M_CYCLE_DETAIL_ID: [57]
  step is now [5] JUST BEFORE CREATING M_MENU_FROM_SOURCE_CYCLE AND INSERT INTO menu2.M_MENU



 Starting M_MENU_FROM_SOURCE_CYCLE optimizations

 Finished: M_MENU_FROM_SOURCE_CYCLE optimizations
 menu2.`M_MENU_FROM_SOURCE_CYCLE` is now filled from  [INSERT INTO `M_MENU_FROM_SOURCE_CYCLE`...]  off  menu1.M_MENU
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` asc --  determines:  FIRST_SOURCE_M_MENU_ID  [94249]
SELECT M_MENU_ID FROM menu2.`M_MENU_FROM_SOURCE_CYCLE` ORDER BY M_MENU_ID DESC; determines: LAST_SOURCE_M_MENU_ID  [95931]
 STARTING_M_CYCLE_DETAIL_ID[151] - FIRST_SOURCE_M_CYCLE_DETAIL_ID[57]  determines  CHG_M_CYCLE_DETAIL_ID : [94] to be used in update statement next ...
 SELECT M_MENU_ID FROM menu2.M_MENU ORDER BY M_MENU_ID DESC   determines:   obtaining last existing M_MENU_ID (for later:M_MENU_ITEM) before inserts (to start from) :  STARTING_M_MENU_ID : [252451]
calculated change: CHG_M_MENU_ID:  [158202] =  STARTING_M_MENU_ID[252451] - FIRST_SOURCE_M_MENU_ID[94249]  ***executed : UPDATE menu2.`M_MENU_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 158202; ::: *****************



 Starting M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations

 Finished: M_MENU_ITEM_FROM_SOURCE_CYCLE optimizations ***executed : UPDATE menu2.`M_MENU_ITEM_FROM_SOURCE_CYCLE` SET M_MENU_ID = M_MENU_ID + 158202; ::: *****************
  step is now [6] just before INSERT INTO menu2.`M_MENU_ITEM`
 starting final `M_MENU_ITEM` insert from `M_MENU_ITEM_FROM_SOURCE_CYCLE` this might take a while ...
 Process complete.  Cycle: [Christmas] from menu1.Christmas should be TRANSFERRED and functional on site: [menu2]
 *******************script completed with no errors*************************
 */
 ?>