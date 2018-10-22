<?php
    /**
     * Created by DeveloperPro ®.
     * User: Gilberto Guerrero Quinayas
     * Date: 25/09/2018
     * Time: 5:35 PM
     */
    
    namespace Service;
    
    
    /**
     * Class EmailTemplate
     *
     * @package Service
     */
    class EmailTemplate
    {
        /**
         * EmailTemplate constructor.
         */
        public function __construct()
        {
        }
        
        /**
         * @param      $code
         * @param null $txtTitle
         * @param null $txtCode
         *
         * @return string
         */
        public function UserCodeEmail($code, $txtTitle = null, $txtCode = null)
        {
            switch ($code) {
                case 'CODE':
                    $template = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional //EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\"><head>
                                <!--[if gte mso 9]><xml>
                                 <o:OfficeDocumentSettings>
                                  <o:AllowPNG/>
                                  <o:PixelsPerInch>96</o:PixelsPerInch>
                                 </o:OfficeDocumentSettings>
                                </xml><![endif]-->
                                <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
                                <meta name=\"viewport\" content=\"width=device-width\">
                                <!--[if !mso]><!--><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><!--<![endif]-->
                                <title></title>
                                
                                
                                <style type=\"text/css\" id=\"media-query\">
                                  body {
                              margin: 0;
                              padding: 0; }
                            
                            table, tr, td {
                              vertical-align: top;
                              border-collapse: collapse; }
                            
                            .ie-browser table, .mso-container table {
                              table-layout: fixed; }
                            
                            * {
                              line-height: inherit; }
                            
                            a[x-apple-data-detectors=true] {
                              color: inherit !important;
                              text-decoration: none !important; }
                            
                            [owa] .img-container div, [owa] .img-container button {
                              display: block !important; }
                            
                            [owa] .fullwidth button {
                              width: 100% !important; }
                            
                            [owa] .block-grid .col {
                              display: table-cell;
                              float: none !important;
                              vertical-align: top; }
                            
                            .ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
                              width: 600px !important; }
                            
                            .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
                              line-height: 100%; }
                            
                            .ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
                              width: 200px !important; }
                            
                            .ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
                              width: 400px !important; }
                            
                            .ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
                              width: 300px !important; }
                            
                            .ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
                              width: 200px !important; }
                            
                            .ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
                              width: 150px !important; }
                            
                            .ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
                              width: 120px !important; }
                            
                            .ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
                              width: 100px !important; }
                            
                            .ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
                              width: 85px !important; }
                            
                            .ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
                              width: 75px !important; }
                            
                            .ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
                              width: 66px !important; }
                            
                            .ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
                              width: 60px !important; }
                            
                            .ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
                              width: 54px !important; }
                            
                            .ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
                              width: 50px !important; }
                            
                            @media only screen and (min-width: 620px) {
                              .block-grid {
                                width: 600px !important; }
                              .block-grid .col {
                                vertical-align: top; }
                                .block-grid .col.num12 {
                                  width: 600px !important; }
                              .block-grid.mixed-two-up .col.num4 {
                                width: 200px !important; }
                              .block-grid.mixed-two-up .col.num8 {
                                width: 400px !important; }
                              .block-grid.two-up .col {
                                width: 300px !important; }
                              .block-grid.three-up .col {
                                width: 200px !important; }
                              .block-grid.four-up .col {
                                width: 150px !important; }
                              .block-grid.five-up .col {
                                width: 120px !important; }
                              .block-grid.six-up .col {
                                width: 100px !important; }
                              .block-grid.seven-up .col {
                                width: 85px !important; }
                              .block-grid.eight-up .col {
                                width: 75px !important; }
                              .block-grid.nine-up .col {
                                width: 66px !important; }
                              .block-grid.ten-up .col {
                                width: 60px !important; }
                              .block-grid.eleven-up .col {
                                width: 54px !important; }
                              .block-grid.twelve-up .col {
                                width: 50px !important; } }
                            
                            @media (max-width: 620px) {
                              .block-grid, .col {
                                min-width: 320px !important;
                                max-width: 100% !important;
                                display: block !important; }
                              .block-grid {
                                width: calc(100% - 40px) !important; }
                              .col {
                                width: 100% !important; }
                                .col > div {
                                  margin: 0 auto; }
                              img.fullwidth, img.fullwidthOnMobile {
                                max-width: 100% !important; }
                              .no-stack .col {
                                min-width: 0 !important;
                                display: table-cell !important; }
                              .no-stack.two-up .col {
                                width: 50% !important; }
                              .no-stack.mixed-two-up .col.num4 {
                                width: 33% !important; }
                              .no-stack.mixed-two-up .col.num8 {
                                width: 66% !important; }
                              .no-stack.three-up .col.num4 {
                                width: 33% !important; }
                              .no-stack.four-up .col.num3 {
                                width: 25% !important; }
                              .mobile_hide {
                                min-height: 0px;
                                max-height: 0px;
                                max-width: 0px;
                                display: none;
                                overflow: hidden;
                                font-size: 0px; } }
                            
                                </style>
                            </head>
                            <body class=\"clean-body\" style=\"margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF\">
                              <style type=\"text/css\" id=\"media-query-bodytag\">
                                @media (max-width: 520px) {
                                  .block-grid {
                                    min-width: 320px!important;
                                    max-width: 100%!important;
                                    width: 100%!important;
                                    display: block!important;
                                  }
                            
                                  .col {
                                    min-width: 320px!important;
                                    max-width: 100%!important;
                                    width: 100%!important;
                                    display: block!important;
                                  }
                            
                                    .col > div {
                                      margin: 0 auto;
                                    }
                            
                                  img.fullwidth {
                                    max-width: 100%!important;
                                  }
                                        img.fullwidthOnMobile {
                                    max-width: 100%!important;
                                  }
                                  .no-stack .col {
                                            min-width: 0!important;
                                            display: table-cell!important;
                                        }
                                        .no-stack.two-up .col {
                                            width: 50%!important;
                                        }
                                        .no-stack.mixed-two-up .col.num4 {
                                            width: 33%!important;
                                        }
                                        .no-stack.mixed-two-up .col.num8 {
                                            width: 66%!important;
                                        }
                                        .no-stack.three-up .col.num4 {
                                            width: 33%!important;
                                        }
                                        .no-stack.four-up .col.num3 {
                                            width: 25%!important;
                                        }
                                  .mobile_hide {
                                    min-height: 0px!important;
                                    max-height: 0px!important;
                                    max-width: 0px!important;
                                    display: none!important;
                                    overflow: hidden!important;
                                    font-size: 0px!important;
                                  }
                                }
                              </style>
                              <!--[if IE]><div class=\"ie-browser\"><![endif]-->
                              <!--[if mso]><div class=\"mso-container\"><![endif]-->
                              <table class=\"nl-container\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #FFFFFF;width: 100%\" cellpadding=\"0\" cellspacing=\"0\">
                                <tbody>
                                <tr style=\"vertical-align: top\">
                                    <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
                                <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"center\" style=\"background-color: #FFFFFF;\"><![endif]-->
                            
                                <div style=\"background-color:#EAE3DD;\">
                                  <div style=\"Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;\" class=\"block-grid \">
                                    <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;\">
                                      <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#EAE3DD;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 600px;\"><tr class=\"layout-full-width\" style=\"background-color:#ffffff;\"><![endif]-->
                            
                                          <!--[if (mso)|(IE)]><td align=\"center\" width=\"600\" style=\" width:600px; padding-right: 0px; padding-left: 0px; padding-top:15px; padding-bottom:15px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
                                        <div class=\"col num12\" style=\"min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;\">
                                          <div style=\"background-color: transparent; width: 100% !important;\">
                                          <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->
                            
                                              
                                                <div align=\"center\" class=\"img-container center  autowidth  \" style=\"padding-right: 0px;  padding-left: 0px;\">
                            <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
                              <img class=\"center  autowidth \" align=\"center\" border=\"0\" src=\"https://d1oco4z2z1fhwp.cloudfront.net/templates/default/69/yourlogo_dark(3).png\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 100px\" width=\"100\">
                            <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                            
                                          
                                          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                          </div>
                                        </div>
                                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                    </div>
                                  </div>
                                </div>
                                <div style=\"background-color:#EAE3DD;\">
                                  <div style=\"Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #892C63;\" class=\"block-grid \">
                                    <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:#892C63;\">
                                      <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#EAE3DD;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 600px;\"><tr class=\"layout-full-width\" style=\"background-color:#892C63;\"><![endif]-->
                            
                                          <!--[if (mso)|(IE)]><td align=\"center\" width=\"600\" style=\" width:600px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
                                        <div class=\"col num12\" style=\"min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;\">
                                          <div style=\"background-color: transparent; width: 100% !important;\">
                                          <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->
                            
                                              
                                                <div align=\"center\" class=\"img-container center  autowidth  fullwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
                            <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
                            <div style=\"line-height:20px;font-size:1px\">&#160;</div>  $txtCode
                            <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                            
                            
                            
                            
                            <div align=\"center\" class=\"button-container center \" style=\"padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:30px;\">
                              <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;\"><tr><td style=\"padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:30px;\" align=\"center\"><v:roundrect xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:w=\"urn:schemas-microsoft-com:office:word\" href=\"http://www.lostreseditores.com\" style=\"height:39pt; v-text-anchor:middle; width:166pt;\" arcsize=\"0%\" strokecolor=\"#FFFFFF\" fillcolor=\"#FFFFFF\"><w:anchorlock/><v:textbox inset=\"0,0,0,0\"><center style=\"color:#892C63; font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:16px;\"><![endif]-->
                                <a href=\"http://www.lostreseditores.com\" target=\"_blank\" style=\"display: block;text-decoration: none;-webkit-text-size-adjust: none;text-align: center;color: #892C63; background-color: #FFFFFF; border-radius: 0px; -webkit-border-radius: 0px; -moz-border-radius: 0px; max-width: 222px; width: 172px;width: auto; border-top: 0px solid transparent; border-right: 0px solid transparent; border-bottom: 0px solid transparent; border-left: 0px solid transparent; padding-top: 10px; padding-right: 25px; padding-bottom: 10px; padding-left: 25px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;mso-border-alt: none\">
                                  <span style=\"font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;font-size:16px;line-height:32px;\"><span style=\"font-family: 'lucida sans unicode', 'lucida grande', sans-serif; font-size: 16px; line-height: 28px;\">VISIT OUR WEBSITE</span></span>
                                </a>
                              <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                            </div>
                            
                                          
                                          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                          </div>
                                        </div>
                                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                    </div>
                                  </div>
                                </div>
                                <div style=\"background-color:#EAE3DD;\">
                                  <div style=\"Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #EDEDED;\" class=\"block-grid three-up \">
                                    <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:#EDEDED;\">
                                      <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#EAE3DD;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 600px;\"><tr class=\"layout-full-width\" style=\"background-color:#EDEDED;\"><![endif]-->
                            
                                          <!--[if (mso)|(IE)]><td align=\"center\" width=\"200\" style=\" width:200px; padding-right: 10px; padding-left: 10px; padding-top:15px; padding-bottom:15px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
                                        <div class=\"col num4\" style=\"max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;\">
                                          <div style=\"background-color: transparent; width: 100% !important;\">
                                          <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 10px; padding-left: 10px;\"><!--<![endif]-->
                            
                                              
                                                <div align=\"center\" class=\"img-container center  autowidth  fullwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
                            <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
                              <img class=\"center  autowidth  fullwidth\" align=\"center\" border=\"0\" src=\"https://d1oco4z2z1fhwp.cloudfront.net/templates/default/69/247support(0).jpg\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 180px\" width=\"180\">
                            <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                            
                                          
                                          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                          </div>
                                        </div>
                                          <!--[if (mso)|(IE)]></td><td align=\"center\" width=\"200\" style=\" width:200px; padding-right: 10px; padding-left: 10px; padding-top:15px; padding-bottom:15px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
                                        <div class=\"col num4\" style=\"max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;\">
                                          <div style=\"background-color: transparent; width: 100% !important;\">
                                          <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 10px; padding-left: 10px;\"><!--<![endif]-->
                            
                                              
                                                <div align=\"center\" class=\"img-container center  autowidth  fullwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
                            <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
                              <img class=\"center  autowidth  fullwidth\" align=\"center\" border=\"0\" src=\"https://d1oco4z2z1fhwp.cloudfront.net/templates/default/69/freedelivery(1).jpg\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 180px\" width=\"180\">
                            <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                            
                                          
                                          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                          </div>
                                        </div>
                                          <!--[if (mso)|(IE)]></td><td align=\"center\" width=\"200\" style=\" width:200px; padding-right: 10px; padding-left: 10px; padding-top:15px; padding-bottom:15px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
                                        <div class=\"col num4\" style=\"max-width: 320px;min-width: 200px;display: table-cell;vertical-align: top;\">
                                          <div style=\"background-color: transparent; width: 100% !important;\">
                                          <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:15px; padding-bottom:15px; padding-right: 10px; padding-left: 10px;\"><!--<![endif]-->
                            
                                              
                                                <div align=\"center\" class=\"img-container center  autowidth  fullwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
                            <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
                              <img class=\"center  autowidth  fullwidth\" align=\"center\" border=\"0\" src=\"https://d1oco4z2z1fhwp.cloudfront.net/templates/default/69/todaysdeal(0).jpg\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 180px\" width=\"180\">
                            <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                            
                                          
                                          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                          </div>
                                        </div>
                                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                    </div>
                                  </div>
                                </div>
                                <div style=\"background-color:#EAE3DD;\">
                                  <div style=\"Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #ffffff;\" class=\"block-grid \">
                                    <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;\">
                                      <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#EAE3DD;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 600px;\"><tr class=\"layout-full-width\" style=\"background-color:#ffffff;\"><![endif]-->
                            
                                          <!--[if (mso)|(IE)]><td align=\"center\" width=\"600\" style=\" width:600px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
                                        <div class=\"col num12\" style=\"min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;\">
                                          <div style=\"background-color: transparent; width: 100% !important;\">
                                          <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->
                            
                                              
                                                <div class=\"\">
                                <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 20px; padding-left: 20px; padding-top: 20px; padding-bottom: 10px;\"><![endif]-->
                                <div style=\"color:#892C63;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%; padding-right: 20px; padding-left: 20px; padding-top: 20px; padding-bottom: 10px;\">
                                    <div style=\"font-size:12px;line-height:14px;color:#892C63;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 18px;line-height: 22px\"><strong><span style=\"font-family: 'lucida sans unicode', 'lucida grande', sans-serif; font-size: 14px; line-height: 16px;\">Discover other offers expiring in 36 hours</span></strong></p></div>
                                </div>
                                <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                                              
                                              
                                                <div class=\"\">
                                <!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 20px; padding-left: 20px; padding-top: 0px; padding-bottom: 20px;\"><![endif]-->
                                <div style=\"color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%; padding-right: 20px; padding-left: 20px; padding-top: 0px; padding-bottom: 20px;\">
                                    <div style=\"font-size:12px;line-height:18px;color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 12px;line-height: 18px\"><span style=\"font-size: 14px; font-family: 'lucida sans unicode', 'lucida grande', sans-serif; line-height: 21px;\"></span><span style=\"font-size: 14px; font-family: 'lucida sans unicode', 'lucida grande', sans-serif; line-height: 21px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tincidunt lectus dui, ut sollicitudin diam varius ac. Ut iaculis volutpat blandit. Nulla vel ligula eu turpis placerat gravida. </span></p></div>
                                </div>
                                <!--[if mso]></td></tr></table><![endif]-->
                            </div>
                                          
                                          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                          </div>
                                        </div>
                                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                    </div>
                                  </div>
                                </div>
                                <div style=\"background-color:#EAE3DD;\">
                                  <div style=\"Margin: 0 auto;min-width: 320px;max-width: 600px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: #EAE3DD;\" class=\"block-grid \">
                                    <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:#EAE3DD;\">
                                      <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#EAE3DD;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 600px;\"><tr class=\"layout-full-width\" style=\"background-color:#EAE3DD;\"><![endif]-->
                            
                                          <!--[if (mso)|(IE)]><td align=\"center\" width=\"600\" style=\" width:600px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
                                        <div class=\"col num12\" style=\"min-width: 320px;max-width: 600px;display: table-cell;vertical-align: top;\">
                                          <div style=\"background-color: transparent; width: 100% !important;\">
                                          <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->
                            
                                          
                                          
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <tbody>
                                    <tr style=\"vertical-align: top\">
                                        <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                            <table class=\"divider_content\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid #BBBBBB;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                                <tbody>
                                                    <tr style=\"vertical-align: top\">
                                                        <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                                            <span></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            
                            
                            <div align=\"center\" style=\"padding-right: 10px; padding-left: 10px; padding-bottom: 20px;\" class=\"\">
                              <div style=\"line-height:10px;font-size:1px\">&#160;</div>
                              <div style=\"display: table; max-width:161px;\">
                              <!--[if (mso)|(IE)]><table width=\"141\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"border-collapse:collapse; padding-right: 10px; padding-left: 10px; padding-bottom: 20px;\"  align=\"center\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:141px;\"><tr><td width=\"32\" style=\"width:32px; padding-right: 10px;\" valign=\"top\"><![endif]-->
                                <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 10px\">
                                  <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
                                    <a href=\"https://www.facebook.com/\" title=\"Facebook\" target=\"_blank\">
                                      <img src=\"images/facebook.png\" alt=\"Facebook\" title=\"Facebook\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
                                    </a>
                                  <div style=\"line-height:5px;font-size:1px\">&#160;</div>
                                  </td></tr>
                                </tbody></table>
                                  <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 10px;\" valign=\"top\"><![endif]-->
                                <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 10px\">
                                  <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
                                    <a href=\"http://twitter.com/\" title=\"Twitter\" target=\"_blank\">
                                      <img src=\"images/twitter.png\" alt=\"Twitter\" title=\"Twitter\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
                                    </a>
                                  <div style=\"line-height:5px;font-size:1px\">&#160;</div>
                                  </td></tr>
                                </tbody></table>
                                  <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 0;\" valign=\"top\"><![endif]-->
                                <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 0\">
                                  <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
                                    <a href=\"http://plus.google.com/\" title=\"Google+\" target=\"_blank\">
                                      <img src=\"images/googleplus.png\" alt=\"Google+\" title=\"Google+\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
                                    </a>
                                  <div style=\"line-height:5px;font-size:1px\">&#160;</div>
                                  </td></tr>
                                </tbody></table>
                                <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                              </div>
                            </div>
                                          
                                          <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
                                          </div>
                                        </div>
                                      <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                    </div>
                                  </div>
                                </div>
                               <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    </td>
                              </tr>
                              </tbody>
                              </table>
                              <!--[if (mso)|(IE)]></div><![endif]-->
                            
                            
                            </body></html>";
            }
            
            return $template;
        }
        public function codeActivation($name,$code,$password){
            $body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional //EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\"><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width\">
    <!--[if !mso]><!--><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><!--<![endif]-->
    <title></title>
    
    
    <style type=\"text/css\" id=\"media-query\">
      body {
  margin: 0;
  padding: 0; }

table, tr, td {
  vertical-align: top;
  border-collapse: collapse; }

.ie-browser table, .mso-container table {
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

[owa] .img-container div, [owa] .img-container button {
  display: block !important; }

[owa] .fullwidth button {
  width: 100% !important; }

[owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 500px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 164px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 328px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 250px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 166px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 125px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 100px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 83px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 71px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 62px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 55px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 50px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 45px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 41px !important; }

@media only screen and (min-width: 520px) {
  .block-grid {
    width: 500px !important; }
  .block-grid .col {
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 500px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 164px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 328px !important; }
  .block-grid.two-up .col {
    width: 250px !important; }
  .block-grid.three-up .col {
    width: 166px !important; }
  .block-grid.four-up .col {
    width: 125px !important; }
  .block-grid.five-up .col {
    width: 100px !important; }
  .block-grid.six-up .col {
    width: 83px !important; }
  .block-grid.seven-up .col {
    width: 71px !important; }
  .block-grid.eight-up .col {
    width: 62px !important; }
  .block-grid.nine-up .col {
    width: 55px !important; }
  .block-grid.ten-up .col {
    width: 50px !important; }
  .block-grid.eleven-up .col {
    width: 45px !important; }
  .block-grid.twelve-up .col {
    width: 41px !important; } }

@media (max-width: 520px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important; }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth, img.fullwidthOnMobile {
    max-width: 100% !important; }
  .no-stack .col {
    min-width: 0 !important;
    display: table-cell !important; }
  .no-stack.two-up .col {
    width: 50% !important; }
  .no-stack.mixed-two-up .col.num4 {
    width: 33% !important; }
  .no-stack.mixed-two-up .col.num8 {
    width: 66% !important; }
  .no-stack.three-up .col.num4 {
    width: 33% !important; }
  .no-stack.four-up .col.num3 {
    width: 25% !important; }
  .mobile_hide {
    min-height: 0px;
    max-height: 0px;
    max-width: 0px;
    display: none;
    overflow: hidden;
    font-size: 0px; } }

    </style>
</head>
<body class=\"clean-body\" style=\"margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF\">
  <style type=\"text/css\" id=\"media-query-bodytag\">
    @media (max-width: 520px) {
      .block-grid {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

      .col {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

        .col > div {
          margin: 0 auto;
        }

      img.fullwidth {
        max-width: 100%!important;
      }
			img.fullwidthOnMobile {
        max-width: 100%!important;
      }
      .no-stack .col {
				min-width: 0!important;
				display: table-cell!important;
			}
			.no-stack.two-up .col {
				width: 50%!important;
			}
			.no-stack.mixed-two-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.mixed-two-up .col.num8 {
				width: 66%!important;
			}
			.no-stack.three-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.four-up .col.num3 {
				width: 25%!important;
			}
      .mobile_hide {
        min-height: 0px!important;
        max-height: 0px!important;
        max-width: 0px!important;
        display: none!important;
        overflow: hidden!important;
        font-size: 0px!important;
      }
    }
  </style>
  <!--[if IE]><div class=\"ie-browser\"><![endif]-->
  <!--[if mso]><div class=\"mso-container\"><![endif]-->
  <table class=\"nl-container\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #FFFFFF;width: 100%\" cellpadding=\"0\" cellspacing=\"0\">
	<tbody>
	<tr style=\"vertical-align: top\">
		<td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
    <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"center\" style=\"background-color: #FFFFFF;\"><![endif]-->

    <div style=\"background-color:#2C2D37;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid two-up \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#2C2D37;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"250\" style=\" width:250px; padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num6\" style=\"max-width: 320px;min-width: 250px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:20px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div align=\"center\" class=\"img-container center  autowidth  fullwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
  <a href=\"\" target=\"_blank\">
    <img class=\"center  autowidth  fullwidth\" align=\"center\" border=\"0\" src=\"https://www.lostreseditores.com/wp-content/logos-lte/Logo-lte-07.png\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;width: 100%;max-width: 250px\" width=\"250\">
  </a>
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
              <!--[if (mso)|(IE)]></td><td align=\"center\" width=\"250\" style=\" width:250px; padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:20px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num6\" style=\"max-width: 320px;min-width: 250px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:20px; padding-bottom:20px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 20px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#6E6F7A; padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 20px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#6E6F7A;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><div style=\"line-height:18px; font-size:12px; text-align: center;\"><strong><span style=\"font-size: 16px; line-height: 24px;\">Mensaje enviado desde&#160;</span></strong></div><div style=\"line-height:18px; font-size:12px; text-align: center;\"><strong><span style=\"font-size: 16px; line-height: 24px;\">Good Jobs</span></strong></div></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#323341;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#323341;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
    <tbody>
        <tr style=\"vertical-align: top\">
            <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                <table class=\"divider_content\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 10px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                    <tbody>
                        <tr style=\"vertical-align: top\">
                            <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 0px; padding-left: 0px; padding-top: 30px; padding-bottom: 30px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 0px; padding-left: 0px; padding-top: 30px; padding-bottom: 30px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 28px; line-height: 33px;\"><strong>¡Codigó de activación!</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div align=\"center\" class=\"img-container center fixedwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
  <a href=\"\" target=\"_blank\">
    <img class=\"center fixedwidth\" align=\"center\" border=\"0\" src=\"https://www.lostreseditores.com/wp-content/logos-lte/security2.png\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;width: 100%;max-width: 400px\" width=\"400\">
  </a>
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#61626F;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#61626F;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:30px; padding-bottom:30px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 24px; line-height: 28px;\"><strong>Gracias por registrarte&#160;</strong></span></p><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 24px; line-height: 28px;\"><strong>$name</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:14px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 18px;line-height: 22px;text-align: center\"><span style=\"font-size: 20px; line-height: 24px;\"><strong>Contraseña:</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#B8B8C0; padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\"><strong>$password</strong></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:14px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 18px;line-height: 22px;text-align: center\"><span style=\"font-size: 20px; line-height: 24px;\"><strong>Codigó de activacion:</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#B8B8C0; padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\"><strong>$code</strong></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
    <tbody>
        <tr style=\"vertical-align: top\">
            <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                <table class=\"divider_content\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                    <tbody>
                        <tr style=\"vertical-align: top\">
                            <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#B8B8C0; padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\"><span style=\"font-size: 13px; line-height: 19px;\">Esta es una notificación automática, por favor no responda este mensaje</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#ffffff;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#ffffff;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:30px; padding-bottom:30px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    
<div align=\"center\" style=\"padding-right: 10px; padding-left: 10px; padding-bottom: 10px;\" class=\"\">
  <div style=\"line-height:10px;font-size:1px\">&#160;</div>
  <div style=\"display: table; max-width:188px;\">
  <!--[if (mso)|(IE)]><table width=\"168\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"border-collapse:collapse; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;\"  align=\"center\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:168px;\"><tr><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://www.facebook.com/lostreseditoresas/\" title=\"Facebook | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/facebook.png\" alt=\"Facebook\" title=\"Facebook | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://twitter.com/Los3Editores\" title=\"Twitter | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/twitter.png\" alt=\"Twitter\" title=\"Twitter | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://www.youtube.com/channel/UCknr-Ysx-KooKQFiumD8qoA\" title=\"YouTube | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/youtube@2x.png\" alt=\"YouTube\" title=\"YouTube | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 0;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 0\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"http://www.lostreseditores.com\" title=\"Web Site | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/website@2x.png\" alt=\"Web Site\" title=\"Web Site | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
  </div>
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#959595; padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#959595;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">En caso de presentar errores comunicate con el departamento de sorpote de Los Tres Editores en las siguientes direcciones&#160;</p><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">&#160;<span style=\"color: rgb(255, 102, 0); font-size: 14px; line-height: 21px;\">tecnologia@lostreseditores.com</span> - <span style=\"color: rgb(255, 102, 0); font-size: 14px; line-height: 21px;\">sistemas@lostreseditores.com</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		</td>
  </tr>
  </tbody>
  </table>
  <!--[if (mso)|(IE)]></div><![endif]-->


</body></html>";
            return $body;
        }
        public function messageInformative($title,$body,$sentFor){
            $body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional //EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\"><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width\">
    <!--[if !mso]><!--><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><!--<![endif]-->
    <title></title>
    
    
    <style type=\"text/css\" id=\"media-query\">
      body {
  margin: 0;
  padding: 0; }

table, tr, td {
  vertical-align: top;
  border-collapse: collapse; }

.ie-browser table, .mso-container table {
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

[owa] .img-container div, [owa] .img-container button {
  display: block !important; }

[owa] .fullwidth button {
  width: 100% !important; }

[owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 500px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 164px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 328px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 250px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 166px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 125px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 100px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 83px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 71px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 62px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 55px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 50px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 45px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 41px !important; }

@media only screen and (min-width: 520px) {
  .block-grid {
    width: 500px !important; }
  .block-grid .col {
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 500px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 164px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 328px !important; }
  .block-grid.two-up .col {
    width: 250px !important; }
  .block-grid.three-up .col {
    width: 166px !important; }
  .block-grid.four-up .col {
    width: 125px !important; }
  .block-grid.five-up .col {
    width: 100px !important; }
  .block-grid.six-up .col {
    width: 83px !important; }
  .block-grid.seven-up .col {
    width: 71px !important; }
  .block-grid.eight-up .col {
    width: 62px !important; }
  .block-grid.nine-up .col {
    width: 55px !important; }
  .block-grid.ten-up .col {
    width: 50px !important; }
  .block-grid.eleven-up .col {
    width: 45px !important; }
  .block-grid.twelve-up .col {
    width: 41px !important; } }

@media (max-width: 520px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important; }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth, img.fullwidthOnMobile {
    max-width: 100% !important; }
  .no-stack .col {
    min-width: 0 !important;
    display: table-cell !important; }
  .no-stack.two-up .col {
    width: 50% !important; }
  .no-stack.mixed-two-up .col.num4 {
    width: 33% !important; }
  .no-stack.mixed-two-up .col.num8 {
    width: 66% !important; }
  .no-stack.three-up .col.num4 {
    width: 33% !important; }
  .no-stack.four-up .col.num3 {
    width: 25% !important; }
  .mobile_hide {
    min-height: 0px;
    max-height: 0px;
    max-width: 0px;
    display: none;
    overflow: hidden;
    font-size: 0px; } }

    </style>
</head>
<body class=\"clean-body\" style=\"margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF\">
  <style type=\"text/css\" id=\"media-query-bodytag\">
    @media (max-width: 520px) {
      .block-grid {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

      .col {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

        .col > div {
          margin: 0 auto;
        }

      img.fullwidth {
        max-width: 100%!important;
      }
			img.fullwidthOnMobile {
        max-width: 100%!important;
      }
      .no-stack .col {
				min-width: 0!important;
				display: table-cell!important;
			}
			.no-stack.two-up .col {
				width: 50%!important;
			}
			.no-stack.mixed-two-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.mixed-two-up .col.num8 {
				width: 66%!important;
			}
			.no-stack.three-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.four-up .col.num3 {
				width: 25%!important;
			}
      .mobile_hide {
        min-height: 0px!important;
        max-height: 0px!important;
        max-width: 0px!important;
        display: none!important;
        overflow: hidden!important;
        font-size: 0px!important;
      }
    }
  </style>
  <!--[if IE]><div class=\"ie-browser\"><![endif]-->
  <!--[if mso]><div class=\"mso-container\"><![endif]-->
  <table class=\"nl-container\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #FFFFFF;width: 100%\" cellpadding=\"0\" cellspacing=\"0\">
	<tbody>
	<tr style=\"vertical-align: top\">
		<td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
    <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"center\" style=\"background-color: #FFFFFF;\"><![endif]-->

    <div style=\"background-color:#2C2D37;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid two-up \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#2C2D37;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"250\" style=\" width:250px; padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num6\" style=\"max-width: 320px;min-width: 250px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:20px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div align=\"center\" class=\"img-container center  autowidth  fullwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
  <a href=\"#\" target=\"_blank\">
    <img class=\"center  autowidth  fullwidth\" align=\"center\" border=\"0\" src=\"https://www.lostreseditores.com/wp-content/logos-lte/Logo-lte-07.png\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;width: 100%;max-width: 250px\" width=\"250\">
  </a>
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
              <!--[if (mso)|(IE)]></td><td align=\"center\" width=\"250\" style=\" width:250px; padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:20px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num6\" style=\"max-width: 320px;min-width: 250px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:20px; padding-bottom:20px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 20px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#6E6F7A; padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 20px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#6E6F7A;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><div style=\"line-height:18px; font-size:12px; text-align: center;\"><strong><span style=\"font-size: 16px; line-height: 24px;\">Mensaje enviado desde&#160;</span></strong></div><div style=\"line-height:18px; font-size:12px; text-align: center;\"><strong><span style=\"font-size: 16px; line-height: 24px;\">Good Jobs</span></strong></div></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#323341;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#323341;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
    <tbody>
        <tr style=\"vertical-align: top\">
            <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                <table class=\"divider_content\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 10px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                    <tbody>
                        <tr style=\"vertical-align: top\">
                            <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 0px; padding-left: 0px; padding-top: 30px; padding-bottom: 30px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 0px; padding-left: 0px; padding-top: 30px; padding-bottom: 30px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 28px; line-height: 33px;\"><strong>¡Mensaje informativo!</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div align=\"center\" class=\"img-container center fixedwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
  <a href=\"#\" target=\"_blank\">
    <img class=\"center fixedwidth\" align=\"center\" border=\"0\" src=\"https://www.lostreseditores.com/wp-content/logos-lte/informacion.png\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;width: 100%;max-width: 275px\" width=\"275\">
  </a>
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#61626F;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#61626F;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:30px; padding-bottom:30px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 24px; line-height: 28px;\"><strong>$title</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#B8B8C0; padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">$body</p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#B8B8C0; padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\"><strong>Mensaje enviado por: $sentFor</strong></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
    <tbody>
        <tr style=\"vertical-align: top\">
            <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                <table class=\"divider_content\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                    <tbody>
                        <tr style=\"vertical-align: top\">
                            <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#B8B8C0; padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\"><span style=\"font-size: 13px; line-height: 19px;\">Esta es una notificación enviada desde Goob Jobs, por favor no responda este mensaje</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#ffffff;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#ffffff;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:30px; padding-bottom:30px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    
<div align=\"center\" style=\"padding-right: 10px; padding-left: 10px; padding-bottom: 10px;\" class=\"\">
  <div style=\"line-height:10px;font-size:1px\">&#160;</div>
  <div style=\"display: table; max-width:188px;\">
  <!--[if (mso)|(IE)]><table width=\"168\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"border-collapse:collapse; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;\"  align=\"center\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:168px;\"><tr><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://www.facebook.com/lostreseditoresas/\" title=\"Facebook | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/facebook.png\" alt=\"Facebook\" title=\"Facebook | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://twitter.com/Los3Editores\" title=\"Twitter | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/twitter.png\" alt=\"Twitter\" title=\"Twitter | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://www.youtube.com/channel/UCknr-Ysx-KooKQFiumD8qoA\" title=\"YouTube | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/youtube@2x.png\" alt=\"YouTube\" title=\"YouTube | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 0;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 0\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"http://www.lostreseditores.com\" title=\"Web Site | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/website@2x.png\" alt=\"Web Site\" title=\"Web Site | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
  </div>
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#959595; padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#959595;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">En caso de presentar errores comunicate con el departamento de sorpote de Los Tres Editores en las siguientes direcciones&#160;</p><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">&#160;<span style=\"color: rgb(255, 102, 0); font-size: 14px; line-height: 21px;\">tecnologia@lostreseditores.com</span> - <span style=\"color: rgb(255, 102, 0); font-size: 14px; line-height: 21px;\">sistemas@lostreseditores.com</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		</td>
  </tr>
  </tbody>
  </table>
  <!--[if (mso)|(IE)]></div><![endif]-->


</body></html>";
            return $body;
        }
        public function resetPassword($count,$password){
            $body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional //EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\"><head>
    <!--[if gte mso 9]><xml>
     <o:OfficeDocumentSettings>
      <o:AllowPNG/>
      <o:PixelsPerInch>96</o:PixelsPerInch>
     </o:OfficeDocumentSettings>
    </xml><![endif]-->
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
    <meta name=\"viewport\" content=\"width=device-width\">
    <!--[if !mso]><!--><meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"><!--<![endif]-->
    <title></title>
    
    
    <style type=\"text/css\" id=\"media-query\">
      body {
  margin: 0;
  padding: 0; }

table, tr, td {
  vertical-align: top;
  border-collapse: collapse; }

.ie-browser table, .mso-container table {
  table-layout: fixed; }

* {
  line-height: inherit; }

a[x-apple-data-detectors=true] {
  color: inherit !important;
  text-decoration: none !important; }

[owa] .img-container div, [owa] .img-container button {
  display: block !important; }

[owa] .fullwidth button {
  width: 100% !important; }

[owa] .block-grid .col {
  display: table-cell;
  float: none !important;
  vertical-align: top; }

.ie-browser .num12, .ie-browser .block-grid, [owa] .num12, [owa] .block-grid {
  width: 500px !important; }

.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {
  line-height: 100%; }

.ie-browser .mixed-two-up .num4, [owa] .mixed-two-up .num4 {
  width: 164px !important; }

.ie-browser .mixed-two-up .num8, [owa] .mixed-two-up .num8 {
  width: 328px !important; }

.ie-browser .block-grid.two-up .col, [owa] .block-grid.two-up .col {
  width: 250px !important; }

.ie-browser .block-grid.three-up .col, [owa] .block-grid.three-up .col {
  width: 166px !important; }

.ie-browser .block-grid.four-up .col, [owa] .block-grid.four-up .col {
  width: 125px !important; }

.ie-browser .block-grid.five-up .col, [owa] .block-grid.five-up .col {
  width: 100px !important; }

.ie-browser .block-grid.six-up .col, [owa] .block-grid.six-up .col {
  width: 83px !important; }

.ie-browser .block-grid.seven-up .col, [owa] .block-grid.seven-up .col {
  width: 71px !important; }

.ie-browser .block-grid.eight-up .col, [owa] .block-grid.eight-up .col {
  width: 62px !important; }

.ie-browser .block-grid.nine-up .col, [owa] .block-grid.nine-up .col {
  width: 55px !important; }

.ie-browser .block-grid.ten-up .col, [owa] .block-grid.ten-up .col {
  width: 50px !important; }

.ie-browser .block-grid.eleven-up .col, [owa] .block-grid.eleven-up .col {
  width: 45px !important; }

.ie-browser .block-grid.twelve-up .col, [owa] .block-grid.twelve-up .col {
  width: 41px !important; }

@media only screen and (min-width: 520px) {
  .block-grid {
    width: 500px !important; }
  .block-grid .col {
    vertical-align: top; }
    .block-grid .col.num12 {
      width: 500px !important; }
  .block-grid.mixed-two-up .col.num4 {
    width: 164px !important; }
  .block-grid.mixed-two-up .col.num8 {
    width: 328px !important; }
  .block-grid.two-up .col {
    width: 250px !important; }
  .block-grid.three-up .col {
    width: 166px !important; }
  .block-grid.four-up .col {
    width: 125px !important; }
  .block-grid.five-up .col {
    width: 100px !important; }
  .block-grid.six-up .col {
    width: 83px !important; }
  .block-grid.seven-up .col {
    width: 71px !important; }
  .block-grid.eight-up .col {
    width: 62px !important; }
  .block-grid.nine-up .col {
    width: 55px !important; }
  .block-grid.ten-up .col {
    width: 50px !important; }
  .block-grid.eleven-up .col {
    width: 45px !important; }
  .block-grid.twelve-up .col {
    width: 41px !important; } }

@media (max-width: 520px) {
  .block-grid, .col {
    min-width: 320px !important;
    max-width: 100% !important;
    display: block !important; }
  .block-grid {
    width: calc(100% - 40px) !important; }
  .col {
    width: 100% !important; }
    .col > div {
      margin: 0 auto; }
  img.fullwidth, img.fullwidthOnMobile {
    max-width: 100% !important; }
  .no-stack .col {
    min-width: 0 !important;
    display: table-cell !important; }
  .no-stack.two-up .col {
    width: 50% !important; }
  .no-stack.mixed-two-up .col.num4 {
    width: 33% !important; }
  .no-stack.mixed-two-up .col.num8 {
    width: 66% !important; }
  .no-stack.three-up .col.num4 {
    width: 33% !important; }
  .no-stack.four-up .col.num3 {
    width: 25% !important; }
  .mobile_hide {
    min-height: 0px;
    max-height: 0px;
    max-width: 0px;
    display: none;
    overflow: hidden;
    font-size: 0px; } }

    </style>
</head>
<body class=\"clean-body\" style=\"margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF\">
  <style type=\"text/css\" id=\"media-query-bodytag\">
    @media (max-width: 520px) {
      .block-grid {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

      .col {
        min-width: 320px!important;
        max-width: 100%!important;
        width: 100%!important;
        display: block!important;
      }

        .col > div {
          margin: 0 auto;
        }

      img.fullwidth {
        max-width: 100%!important;
      }
			img.fullwidthOnMobile {
        max-width: 100%!important;
      }
      .no-stack .col {
				min-width: 0!important;
				display: table-cell!important;
			}
			.no-stack.two-up .col {
				width: 50%!important;
			}
			.no-stack.mixed-two-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.mixed-two-up .col.num8 {
				width: 66%!important;
			}
			.no-stack.three-up .col.num4 {
				width: 33%!important;
			}
			.no-stack.four-up .col.num3 {
				width: 25%!important;
			}
      .mobile_hide {
        min-height: 0px!important;
        max-height: 0px!important;
        max-width: 0px!important;
        display: none!important;
        overflow: hidden!important;
        font-size: 0px!important;
      }
    }
  </style>
  <!--[if IE]><div class=\"ie-browser\"><![endif]-->
  <!--[if mso]><div class=\"mso-container\"><![endif]-->
  <table class=\"nl-container\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 320px;Margin: 0 auto;background-color: #FFFFFF;width: 100%\" cellpadding=\"0\" cellspacing=\"0\">
	<tbody>
	<tr style=\"vertical-align: top\">
		<td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
    <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td align=\"center\" style=\"background-color: #FFFFFF;\"><![endif]-->

    <div style=\"background-color:#2C2D37;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid two-up \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#2C2D37;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"250\" style=\" width:250px; padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:5px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num6\" style=\"max-width: 320px;min-width: 250px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:20px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div align=\"center\" class=\"img-container center  autowidth  fullwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
  <img class=\"center  autowidth  fullwidth\" align=\"center\" border=\"0\" src=\"https://www.lostreseditores.com/wp-content/logos-lte/Logo-lte-07.png\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 250px\" width=\"250\">
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
              <!--[if (mso)|(IE)]></td><td align=\"center\" width=\"250\" style=\" width:250px; padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:20px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num6\" style=\"max-width: 320px;min-width: 250px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:20px; padding-bottom:20px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 20px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#6E6F7A; padding-right: 10px; padding-left: 10px; padding-top: 20px; padding-bottom: 20px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#6E6F7A;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><div style=\"line-height:18px; font-size:12px; text-align: center;\"><strong><span style=\"font-size: 16px; line-height: 24px;\">Mensaje enviado desde&#160;</span></strong></div><div style=\"line-height:18px; font-size:12px; text-align: center;\"><strong><span style=\"font-size: 16px; line-height: 24px;\">Good Jobs</span></strong></div></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#323341;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#323341;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
    <tbody>
        <tr style=\"vertical-align: top\">
            <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                <table class=\"divider_content\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 10px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                    <tbody>
                        <tr style=\"vertical-align: top\">
                            <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 0px; padding-left: 0px; padding-top: 30px; padding-bottom: 30px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 0px; padding-left: 0px; padding-top: 30px; padding-bottom: 30px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 28px; line-height: 33px;\"><strong>¡Cambio de contraseña!</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div align=\"center\" class=\"img-container center fixedwidth \" style=\"padding-right: 0px;  padding-left: 0px;\">
<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr style=\"line-height:0px;line-height:0px;\"><td style=\"padding-right: 0px; padding-left: 0px;\" align=\"center\"><![endif]-->
  <img class=\"center fixedwidth\" align=\"center\" border=\"0\" src=\"https://www.lostreseditores.com/wp-content/logos-lte/cambio_pass.png\" alt=\"Image\" title=\"Image\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: 0;height: auto;float: none;width: 100%;max-width: 275px\" width=\"275\">
<!--[if mso]></td></tr></table><![endif]-->
</div>

                  
                  
                    
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
    <tbody>
        <tr style=\"vertical-align: top\">
            <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                <table class=\"divider_content\" height=\"0px\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 1px solid #323341;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                    <tbody>
                        <tr style=\"vertical-align: top\">
                            <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;font-size: 0px;line-height: 0px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <span>&#160;</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#61626F;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#61626F;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:30px; padding-bottom:30px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><strong><span style=\"font-size: 24px; line-height: 28px;\">Se solicito el cambio de contraseña de tu cuenta $count si crees que es un error comunícate con el soporte técnico</span></strong></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 20px; line-height: 24px;\"><strong>Contraseña</strong></span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:120%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#ffffff; padding-right: 10px; padding-left: 10px; padding-top: 25px; padding-bottom: 10px;\">	
		<div style=\"line-height:14px;font-size:12px;color:#ffffff;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;line-height: 14px;text-align: center;font-size: 12px\"><span style=\"font-size: 20px; line-height: 24px;\">$password</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
                  
                    
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" class=\"divider \" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;min-width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
    <tbody>
        <tr style=\"vertical-align: top\">
            <td class=\"divider_inner\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;padding-right: 10px;padding-left: 10px;padding-top: 10px;padding-bottom: 10px;min-width: 100%;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                <table class=\"divider_content\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;border-top: 0px solid transparent;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                    <tbody>
                        <tr style=\"vertical-align: top\">
                            <td style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%\">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#B8B8C0; padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#B8B8C0;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">&#160;</p><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\"><span style=\"font-size: 13px; line-height: 19px;\">Esta es una notificación automatica, por favor no responda este mensaje</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
    <div style=\"background-color:#ffffff;\">
      <div style=\"Margin: 0 auto;min-width: 320px;max-width: 500px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;background-color: transparent;\" class=\"block-grid \">
        <div style=\"border-collapse: collapse;display: table;width: 100%;background-color:transparent;\">
          <!--[if (mso)|(IE)]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"background-color:#ffffff;\" align=\"center\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"width: 500px;\"><tr class=\"layout-full-width\" style=\"background-color:transparent;\"><![endif]-->

              <!--[if (mso)|(IE)]><td align=\"center\" width=\"500\" style=\" width:500px; padding-right: 0px; padding-left: 0px; padding-top:30px; padding-bottom:30px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;\" valign=\"top\"><![endif]-->
            <div class=\"col num12\" style=\"min-width: 320px;max-width: 500px;display: table-cell;vertical-align: top;\">
              <div style=\"background-color: transparent; width: 100% !important;\">
              <!--[if (!mso)&(!IE)]><!--><div style=\"border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent; padding-top:30px; padding-bottom:30px; padding-right: 0px; padding-left: 0px;\"><!--<![endif]-->

                  
                    
<div align=\"center\" style=\"padding-right: 10px; padding-left: 10px; padding-bottom: 10px;\" class=\"\">
  <div style=\"line-height:10px;font-size:1px\">&#160;</div>
  <div style=\"display: table; max-width:188px;\">
  <!--[if (mso)|(IE)]><table width=\"168\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"border-collapse:collapse; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;\"  align=\"center\"><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"border-collapse:collapse; mso-table-lspace: 0pt;mso-table-rspace: 0pt; width:168px;\"><tr><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://www.facebook.com/lostreseditoresas/\" title=\"Facebook | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/facebook.png\" alt=\"Facebook\" title=\"Facebook | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://twitter.com/Los3Editores\" title=\"Twitter | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/twitter.png\" alt=\"Twitter\" title=\"Twitter | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 5px;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 5px\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"https://www.youtube.com/channel/UCknr-Ysx-KooKQFiumD8qoA\" title=\"YouTube | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/youtube@2x.png\" alt=\"YouTube\" title=\"YouTube | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
      <!--[if (mso)|(IE)]></td><td width=\"32\" style=\"width:32px; padding-right: 0;\" valign=\"top\"><![endif]-->
    <table align=\"left\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"32\" height=\"32\" style=\"border-collapse: collapse;table-layout: fixed;border-spacing: 0;mso-table-lspace: 0pt;mso-table-rspace: 0pt;vertical-align: top;Margin-right: 0\">
      <tbody><tr style=\"vertical-align: top\"><td align=\"left\" valign=\"middle\" style=\"word-break: break-word;border-collapse: collapse !important;vertical-align: top\">
        <a href=\"http://www.lostreseditores.com\" title=\"Web Site | Los Tres Editores\" target=\"_blank\">
          <img src=\"https://www.lostreseditores.com/wp-content/logos-lte/website@2x.png\" alt=\"Web Site\" title=\"Web Site | Los Tres Editores\" width=\"32\" style=\"outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;clear: both;display: block !important;border: none;height: auto;float: none;max-width: 32px !important\">
        </a>
      </td></tr>
    </tbody></table>
    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
  </div>
</div>
                  
                  
                    <div class=\"\">
	<!--[if mso]><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\"><tr><td style=\"padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;\"><![endif]-->
	<div style=\"line-height:150%;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;color:#959595; padding-right: 10px; padding-left: 10px; padding-top: 15px; padding-bottom: 10px;\">	
		<div style=\"font-size:12px;line-height:18px;color:#959595;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;text-align:left;\"><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">En caso de presentar errores comunicate con el departamento de sorpote de Los Tres Editores en las siguientes direcciones&#160;</p><p style=\"margin: 0;font-size: 14px;line-height: 21px;text-align: center\">&#160;<span style=\"color: rgb(255, 102, 0); font-size: 14px; line-height: 21px;\">tecnologia@lostreseditores.com</span> - <span style=\"color: rgb(255, 102, 0); font-size: 14px; line-height: 21px;\">sistemas@lostreseditores.com</span></p></div>	
	</div>
	<!--[if mso]></td></tr></table><![endif]-->
</div>
                  
              <!--[if (!mso)&(!IE)]><!--></div><!--<![endif]-->
              </div>
            </div>
          <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
      </div>
    </div>
   <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
		</td>
  </tr>
  </tbody>
  </table>
  <!--[if (mso)|(IE)]></div><![endif]-->


</body></html>";
            return $body;
        }

    }