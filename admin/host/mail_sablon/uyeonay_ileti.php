<?php 
$uyeonay_ileti = '<!DOCTYPE html><html lang="'.@$lang.'" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta charset="utf-8"><meta name="x-apple-disable-message-reformatting"><meta http-equiv="x-ua-compatible" content="ie=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="format-detection" content="telephone=no, date=no, address=no, email=no"><!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><style>td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}</style><![endif]--><link href="https://fonts.googleapis.com/css?family=Arial:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700" rel="stylesheet" media="screen"><style>.hover-underline:hover{text-decoration:underline!important}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{100%,75%{transform:scale(2);opacity:0}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,100%{transform:translateY(-25%);animation-timing-function:cubic-bezier(0.8,0,1,1)}50%{transform:none;animation-timing-function:cubic-bezier(0,0,0.2,1)}}@media (max-width:600px){.sm-leading-32{line-height:32px!important}.sm-px-24{padding-left:24px!important;padding-right:24px!important}.sm-py-32{padding-top:32px!important;padding-bottom:32px!important}.sm-w-full{width:100%!important}}</style>
  </head><body style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased;  background-color: #eceff1; background-color: rgba(236, 239, 241);">
    <div style="display: none;">'.$bloklar["register_onay_mail_one"].'</div>
    <div role="article" aria-roledescription="email" aria-label="'.$bloklar["register_onay_mail_one"].'" lang="'.@$lang.'">
    <table style="font-family: Arial, -apple-system, Arial, sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation"><tr><td align="center" style=" background-color: #eceff1; background-color: rgba(236, 239, 241); font-family: Arial, -apple-system, Arial, sans-serif;" bgcolor="rgba(236, 239, 241)"><table class="sm-w-full" style="font-family: Arial,sans-serif; width: 600px;" width="600" cellpadding="0" cellspacing="0" role="presentation"><tr><td class="sm-py-32 sm-px-24" style="font-family: Arial, -apple-system, Arial, sans-serif; padding: 48px; text-align: center;" align="center">
                  <a href="'.URL.'">
                    <img src="'.URL.'images/'.$ayar["logo"].'" width="450" alt="'.$ayar[$lehce."site_title"].'" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle;">
                  </a>
            </td></tr><tr><td align="center" class="sm-px-24" style="font-family: Arial,sans-serif;"><table style="font-family: Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation"><tr><td class="sm-px-24" style=" background-color: #ffffff; background-color: rgba(255, 255, 255); border-radius: 4px; font-family:Arial, -apple-system, Arial, sans-serif; font-size: 14px; line-height: 24px; padding: 48px; text-align: left;  color: #626262; color: rgba(98, 98, 98);" align="left">
                        <p style="font-weight: 600; font-size: 18px; margin-bottom: 0;">'.$bloklar["onay_mail_baslik"].'</p>
                        <p style="font-weight: 700; font-size: 20px; margin-top: 0;  color: #ff5850; color: rgba(255, 88, 80);">'.@$name.' '.@$surname.'</p>
                        <p class="sm-leading-32" style="font-weight: 600; font-size: 20px; margin: 0 0 16px;  color: #263238; color: rgba(38, 50, 56);">
                          '.$bloklar["onay_mail_baslik_iki"].' 👋
                        </p>
                        <p style="margin: 0 0 24px;">'.$bloklar["onay_mail_icerik_bir"].'</p>
                        <p style="margin: 0 0 24px;">'.$bloklar["onay_mail_icerik_iki"].' <a href="mailto:'.$ayar["email"].'" class="hover-underline" style=" color: #164921;  text-decoration: none;">'.$ayar["email"].'</a>
                        </p>
                        <a href="'.URL.'verify?id='.@$last_insert_id.'&code='.@$random_code.'&email='.@$eposta.'" style="display: block; font-size: 14px; line-height: 100%; margin-bottom: 24px;  color: #164921;  text-decoration: none;">'.URL.'verify?id='.@$last_insert_id.'&code='.@$random_code.'&email='.@$eposta.'</a>
                        <table style="font-family: Arial,sans-serif;" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="mso-padding-alt: 16px 24px;  background-color: #164921; background- border-radius: 4px; font-family:Arial, -apple-system, Arial, sans-serif;" bgcolor="rgba(115, 103, 240)">
                              <a href="'.URL.'verify?id='.@$last_insert_id.'&code='.@$random_code.'&email='.@$eposta.'" style="display: block; font-weight: 600; font-size: 14px; line-height: 100%; background: #164921;padding: 16px 24px;  color: #ffffff; color: rgba(255, 255, 255); text-decoration: none;">'.$bloklar["onay_mail_buton"].'</a>
                            </td></tr></table><table style="font-family: Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="font-family: Arial,sans-serif; padding-top: 32px; padding-bottom: 32px;"><div style=" background-color: #eceff1; background-color: rgba(236, 239, 241); height: 1px; line-height: 1px;">&zwnj;</div></td></tr></table>
                        <p style="margin: 0 0 16px;">'.$bloklar["onay_mail_footer_bir"].' <a href="mailto:'.$ayar["email"].'" class="hover-underline" style=" color: #164921;  text-decoration: none;"> '.$ayar["email"].'</a>.
                        </p>
                        <p style="margin: 0 0 16px;">'.$bloklar["onay_mail_footer_iki"].'<br>'.$ayar[$lehce."site_title"].'</p>
                      </td></tr><tr><td style="font-family: Arial,sans-serif; height: 20px;" height="20"></td></tr><tr>
                      <td style="font-family:Arial, -apple-system, Arial, sans-serif; font-size: 12px; padding-left: 48px; padding-right: 48px;  color: #eceff1; color: rgba(236, 239, 241);">
                        <p align="center" style="cursor: default; margin-bottom: 16px;">
                          <a href="'.$ayar["facebook_url"].'" style=" color: #263238; color: rgba(38, 50, 56); text-decoration: none;"><img src="'.URL.'images/facebook.png" width="17" alt="Facebook" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                          &bull;
                          <a href="'.$ayar["twitter_url"].'" style=" color: #263238; color: rgba(38, 50, 56); text-decoration: none;"><img src="'.URL.'images/twitter.png" width="17" alt="Twitter" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                          &bull;
                          <a href="'.$ayar["instagram_url"].'" style=" color: #263238; color: rgba(38, 50, 56); text-decoration: none;"><img src="'.URL.'images/instagram.png" width="17" alt="Instagram" style="border: 0; max-width: 100%; line-height: 100%; vertical-align: middle; margin-right: 12px;"></a>
                        </p>
                        <p style=" color: #263238; color: rgba(38, 50, 56);">
                       '.$bloklar["onay_mail_footer_uc"].'
                          '.$bloklar["mail_footer_yazi"].'.
                        </p>
                      </td></tr><tr><td style="font-family: Arial,sans-serif; height: 16px;" height="16"></td></tr></table></td></tr></table></td></tr></table></div></body></html>';

$uyeonay_ileti = trim($uyeonay_ileti);

    
?>