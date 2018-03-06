
plugin.tx_tp3facebook_fbplugins {
  view {
    # cat=plugin.tx_tp3facebook_fbplugins/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:tp3_facebook/Resources/Private/Templates/
    # cat=plugin.tx_tp3facebook_fbplugins/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:tp3_facebook/Resources/Private/Partials/
    # cat=plugin.tx_tp3facebook_fbplugins/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:tp3_facebook/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_tp3facebook_fbplugins//a; type=string; label=Default storage PID
    storagePid =
  }
}
