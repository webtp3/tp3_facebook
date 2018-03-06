
plugin.tx_tp3facebook_fbplugins {
  view {
    templateRootPaths.0 = EXT:tp3_facebook/Resources/Private/Templates/
    templateRootPaths.1 = plugin.tx_tp3facebook_fbplugins.view.templateRootPath
    partialRootPaths.0 = EXT:tp3_facebook/Resources/Private/Partials/
    partialRootPaths.1 = plugin.tx_tp3facebook_fbplugins.view.partialRootPath
    layoutRootPaths.0 = EXT:tp3_facebook/Resources/Private/Layouts/
    layoutRootPaths.1 = plugin.tx_tp3facebook_fbplugins.view.layoutRootPath
  }
  persistence {
    storagePid = plugin.tx_tp3facebook_fbplugins.persistence.storagePid
    #recursive = 1
  }
  features {
    #skipDefaultArguments = 1
  }
  mvc {
    #callDefaultActionIfActionCantBeResolved = 1
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
