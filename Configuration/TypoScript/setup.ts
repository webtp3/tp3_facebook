plugin.tx_tp3facebook_fbplugin = USER_INT
plugin.tx_tp3facebook_fbplugin {
  userFunc = Tp3\Tp3Facebook\Plugin\FBPlugins->main
  staticTemplateCheck = 1

  appID = {$plugin.tx_tp3facebook_fbplugin.appID}
  language = {$plugin.tx_tp3facebook_fbplugin.language}
  templateFile = {$plugin.tx_tp3facebook_fbplugin.templateFile}
  W3Cmode = 0


  # choose one of these possibilities:
  # activity_feed, comments, facepile, like_button, like_box, live_stream, login_button, recommendations, send_button, subscribe_button
  type_form =


  # Activity Feed: http://developers.facebook.com/docs/reference/plugins/activity/
  activity_feed {
    # Show in iFrame (not recommended!)
    a_show_in_iframe = 0

    # Domain
    a_domain =

    # Width
    a_width = 300

    # Height
    a_height = 300

    # Header
    a_show_header = 1

    # Color Scheme: choose one of these values: light, dark
    a_color_scheme = light

    # Font: choose one of these values: arial, lucida+grande, segoe+ui, tahoma, trebuchet+ms, verdana
    a_font = arial

    # Border Color (hex value)
    a_border =
  }


  # Comments: http://developers.facebook.com/docs/reference/plugins/comments/
  comments {
    # Unique ID
    b_unique_id =

    # Number of Comments
    b_number = 10

    # Width
    b_width = 450

    # Publish Feed
    b_publish_feed = 1
  }


  # Facepile: http://developers.facebook.com/docs/reference/plugins/facepile/
  facepile {
    # Show in iFrame (not recommended!)
    c_show_in_iframe = 0

    # URL
    c_url =

    # Num rows
    c_num_rows = 10

    # Width
    c_width = 200
  }

  # Like Button: http://developers.facebook.com/docs/reference/plugins/like/
  like_button {
    # Show in iFrame (not recommended!)
    d_show_in_iframe = 0

    # URL to Like
    d_url =

    # Layout Style: choose one of these values: standard, button_count, box_count
    d_layout_style = standard

    # Show Faces
    d_show_faces = 0

    # Share button
    d_share = 0

    # Width
    d_width = 450

    # Height
    d_height = 100

    # Verb to display: choose one of these values: like, recommend
    d_verb = like

    # Font: choose one of these values: arial, lucida+grande, segoe+ui, tahoma, trebuchet+ms, verdana
    d_font = arial

    # Color Scheme: choose one of these values: light, dark
    d_color_scheme = light

    # Open Graph - Title
    d_og_title =

    # Open Graph - Type: choose one of these values: activity, sport, bar, company, cafe, hotel, restaurant, cause, sports_league, sports_team, band, government, non_profit, school, university, actor, athlete, author, director, musician, politician, public_figure, city, country, landmark, state_province, album, book, drink, food, game, product, song, movie, tv_show, blog, website, article
    d_og_type =

    # Open Graph - URL
    d_og_url =

    # Open Graph - Image URL
    d_og_image_url =

    # Open Graph - Sitename
    d_og_sitename =

    # Open Graph - Description
    d_og_description =
  }

  # Like Box: http://developers.facebook.com/docs/reference/plugins/like-box/
  like_box {
    # Show in iFrame (not recommended!)
    e_show_in_iframe = 0

    # Facebook Page URL
    e_page_url =

    # Width
    e_width = 300

    # Height
    e_height = 300

    # Show faces
    e_show_faces = 1

    # Show stream
    e_show_stream = 1

    # Show header
    e_show_header = 1

    # Show border
    e_show_border = 1
  }

  # Recommendations: http://developers.facebook.com/docs/reference/plugins/recommendations/
  recommendations {
    # Show in iFrame (not recommended!)
    h_show_in_iframe = 0

    # Domain
    h_domain =

    # Width
    h_width = 300

    # Height
    h_height = 300

    # Header
    h_show_header = 1

    # Color Scheme: choose one of these values: light, dark
    h_color_scheme = light

    # Font: choose one of these values: arial, lucida+grande, segoe+ui, tahoma, trebuchet+ms, verdana
    h_font = arial

    # Border Color (hex value)
    h_border =
  }

  # Send Button: http://developers.facebook.com/docs/reference/plugins/send/
  send_button {
    # URL
    i_url =

    # Font: choose one of these values: arial, lucida+grande, segoe+ui, tahoma, trebuchet+ms, verdana
    i_font = arial

    # Color Scheme: choose one of these values: light, dark
    i_color_scheme = light
  }

  # Subscribe Button: http://developers.facebook.com/docs/reference/plugins/subscribe/
  send_button {
    # Show in iFrame (not recommended!)
    j_show_in_iframe = 0

    # Profile URL
    j_url =

    # Layout Style: choose one of these values: standard, button_count, box_count
    j_layout_style = standard

    # Show Faces
    j_show_faces = 0

    # Width
    j_width = 450

    # Height
    j_height = 100

    # Font: choose one of these values: arial, lucida+grande, segoe+ui, tahoma, trebuchet+ms, verdana
    j_font = arial

    # Color Scheme: choose one of these values: light, dark
    j_color_scheme = light
  }

  # Share Button http://developers.facebook.com/docs/plugins/share-button
  share_button {
    # Profile ID
    k_url =

    # Width
    k_width = 450
  }

  view {
    templateRootPaths.0 = EXT:tp3_facebook/Resources/Private/Templates/
    templateRootPaths.1 = plugin.tx_tp3facebook_fbplugin.view.templateRootPath
    partialRootPaths.0 = EXT:tp3_facebook/Resources/Private/Partials/
    partialRootPaths.1 = plugin.tx_tp3facebook_fbplugin.view.partialRootPath
    layoutRootPaths.0 = EXT:tp3_facebook/Resources/Private/Layouts/
    layoutRootPaths.1 = plugin.tx_tp3facebook_fbplugin.view.layoutRootPath
  }
  persistence {
    storagePid = plugin.tx_tp3facebook_fbplugin.persistence.storagePid
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    callDefaultActionIfActionCantBeResolved = 1
  }
}

plugin.tx_tp3facebook._CSS_DEFAULT_STYLE (
    textarea.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    input.f3-form-error {
        background-color:#FF9F9F;
        border: 1px #FF0000 solid;
    }

    .tx-tp3-facebook table {
        border-collapse:separate;
        border-spacing:10px;
    }

    .tx-tp3-facebook table th {
        font-weight:bold;
    }

    .tx-tp3-facebook table td {
        vertical-align:top;
    }

    .typo3-messages .message-error {
        color:red;
    }

    .typo3-messages .message-ok {
        color:green;
    }
)
