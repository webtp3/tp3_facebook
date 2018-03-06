<?php
namespace Tp3\Tp3Facebook\Plugin;

/***
 *
 * This file is part of the "tp3 social" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Thomas Ruta <email@thomasruta.de>, R&P IT Consulting GmbH
 *
 ***/
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Core\Page\PageRenderer;
/**
 * FBPlugins
  */
class FBPlugins extends  \TYPO3\CMS\Frontend\Plugin\AbstractPlugin
{
    public static  $prefixId      = 'tx_tp3facebook_fbplugins';		// Same as class name
    public static $extKey        = 'tp3_facebook';	// The extension key.
    public static $pi_checkCHash = true;

    /**
     *
     * @var layout;
     */

    public $layout;

	/**
	 * action translate
	 *
	 * @return string
	 */
	
	private function gettranslation($key){
		//$extensionName = "Tp3share";
		\TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate( $key, $this->extKey);
	}
	/**
	 *
	 * @var \TYPO3\CMS\Core\Page\PageRenderer;
	 */
	
	public $pageRenderer;
    /**
     *
     * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
     */
    public  $settings;

	/**
	 *
	 * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
	 */
	public  $cObj;

    /**
     * The main method of the PlugIn
     *
     * @param	string		$content: The PlugIn content
     * @param	array		$conf: The PlugIn configuration
     * @return	The content that is displayed on the website
     */
    function main($content, $conf) {
        $this->conf = $conf;
        $this->pi_setPiVarDefaults();
        $this->pi_initPIflexForm();
        $this->ffConf = array();
        $this->templateFile = $this->cObj->fileResource($this->conf['templateFile']);

        // Check if static template and App ID is loaded
        if($this->conf['staticTemplateCheck'] != 1){
            return '<b>Please include the static template!</b>';
        } elseif(empty($this->conf['appID'])){
            return '<b>Enter your App ID in the configuration of this plugin in the Extension Manager.</b><br /><i>If you haven\'t got one, you can get an App ID here: <a href="http://developers.facebook.com/setup/" target="_blank">http://developers.facebook.com/setup/</a></i>';
        }

        // decide if plugin is configured via Flexform or TypoScript
        if ($this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'type_form') != '') {
            $mode = 'ff';
            $this->ffConf['type_form'] = $this->pi_getFFvalue($this->cObj->data['pi_flexform'], 'type_form');
        } elseif ($this->conf['type_form'] != '') {
            $mode = 'ts';
            $this->ffConf['type_form'] = $this->conf['type_form'];
        } else {
            return '<b>You have to set type_form via TypoScript or Flexform!</b>';
        }

        switch($mode){
            case 'ff':
                foreach($this->cObj->data['pi_flexform']['data']['sDEF']['lDEF'] as $key => $value){
                    $this->ffConf[$key] = $value['vDEF'];
                    $this->marker['###'.strtoupper($key).'###'] = $value['vDEF'];
                }
                break;
            case 'ts':
                foreach($this->conf[$this->ffConf['type_form'].'.'] as $key => $value){
                    $this->ffConf[$key] = $value;
                    $this->marker['###'.strtoupper($key).'###'] = $value;
                }
                break;
        }

        if(!empty($this->conf['language'])){
            $this->language = $this->conf['language'];
        } elseif(empty($this->conf['language']) && !empty($GLOBALS['TSFE']->config['config']['locale_all'])) {
            $this->language = $GLOBALS['TSFE']->config['config']['locale_all'];
        } else {
            $this->language = 'en_US';
        }

        $this->marker['###LOCALE###'] = $this->language;
        $this->marker['###APP_ID###'] = $this->conf['appID'];

        // Add extra <html> tag attribute (for IE)
        if($this->ffConf['type_form'] == 'like_button' && !empty($this->ffConf['d_og_title']) && !empty($this->ffConf['d_og_type']) && !empty($this->ffConf['d_og_url']) && !empty($this->ffConf['d_og_image_url']) && !empty($this->ffConf['d_og_sitename']) && !empty($this->ffConf['d_og_description'])){
            $addData = '
				<meta property="og:title" content="'.$this->ffConf['d_og_title'].'" />
				<meta property="og:type" content="'.$this->ffConf['d_og_type'].'" />
				<meta property="og:url" content="'.$this->ffConf['d_og_url'].'" />
				<meta property="og:image" content="'.$this->ffConf['d_og_image_url'].'" />
				<meta property="og:site_name" content="'.$this->ffConf['d_og_sitename'].'" />
				<meta property="og:description" content="'.$this->ffConf['d_og_description'].'"/>
				<meta property="fb:app_id" content="'.$this->conf['appID'].'" />
			';
            if($this->conf['W3Cmode'] == 1){
                $GLOBALS['TSFE']->additionalHeaderData[$this->extKey] = '<!-- '.$addData.' -->';
            } else {
                $GLOBALS['TSFE']->additionalHeaderData[$this->extKey] = $addData;
            }
        }

        if(!empty($this->ffConf['type_form'])){
            $GLOBALS['TSFE']->additionalFooterData[$this->extKey] = '
			<div id="fb-root"></div>
			<script>
				(function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0];
					if (d.getElementById(id)) return;
					js = d.createElement(s); js.id = id;
					js.src = "//connect.facebook.net/'.$this->marker['###LOCALE###'].'/sdk.js#xfbml=1&appId='.$this->marker['###APP_ID###'].'&version=v2.0";
					fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));
			</script>';
        }

        switch($this->ffConf['type_form']){
            case 'activity_feed':
                $content .= $this->displayActivityFeed();
                break;
            case 'comments':
                $content .= $this->displayComments();
                break;
            case 'facepile':
                $content .= $this->displayFacepile();
                break;
            case 'like_button':
                $content .= $this->displayLikeButton();
                break;
            case 'like_box':
                $content .= $this->displayLikeBox();
                break;
            case 'recommendations':
                $content .= $this->displayRecommendations();
                break;
            case 'send_button':
                $content .= $this->displaySendButton();
                break;
            case 'subscribe_button':
                $content .= $this->displaySubscribeButton();
                break;
            case 'share_button':
                $content .= $this->displayShareButton();
                break;
            case 'embedded':
                $content .= $this->displayEmbedded();
                break;
        }

        if ($content != '') {
            if($this->conf['W3Cmode'] == 1){
                $content = '<script language="javascript" type="text/javascript">
                    //<![CDATA[
                    document.write(\''.str_replace('
                    ','',$content).'\');
                    //]]>
                    </script>';
            }
            return $this->pi_wrapInBaseClass($content);
        }
        else {
            return '';
        }
    }




    /**
     * Displays the Activity Feed.
     * http://developers.facebook.com/docs/reference/plugins/activity/
     *
     * @return	STRING	$content	...
     */
    function displayActivityFeed(){
        if($this->ffConf['a_show_in_iframe'] == 1){
            $this->templatePrefix = '_IFRAME';
        } else {
            $content = '';
        }
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_ACTIVITY_FEED'.$this->templatePrefix.'###');
        $this->marker['###A_SHOW_HEADER###'] = ($this->marker['###A_SHOW_HEADER###'] == 1 ? 'true' : 'false');
        $this->marker['###A_SHOW_RECOMMENDATIONS###'] = ($this->marker['###A_SHOW_RECOMMENDATIONS###'] == 1 ? 'true' : 'false');
        $content .= $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Comments box.
     * http://developers.facebook.com/docs/reference/plugins/comments/
     *
     * @return	STRING	$content	...
     */
    function displayComments(){
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_COMMENTS###');
        $this->marker['###B_PUBLISH_FEED###'] = ($this->marker['###B_PUBLISH_FEED###'] == 1 ? 'true' : 'false');
        $this->marker['###B_URL###'] = t3lib_div::getIndpEnv('TYPO3_REQUEST_URL');
        $content = $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Facepile plugin.
     * http://developers.facebook.com/docs/reference/plugins/facepile/
     *
     * @return	STRING	$content	...
     */
    function displayFacepile(){
        if($this->ffConf['c_show_in_iframe'] == 1){
            $this->templatePrefix = '_IFRAME';
        } else {
            $content = '';
        }
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_FACEPILE###');
        $content = $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Like button.
     * http://developers.facebook.com/docs/reference/plugins/like/
     *
     * @return	STRING	$content	...
     */
    function displayLikeButton(){
        if($this->ffConf['d_show_in_iframe'] == 1){
            $this->templatePrefix = '_IFRAME';
        } else {
            $content = '';
        }

        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_LIKE_BUTTON'.$this->templatePrefix.'###');
        if(!$this->marker['###D_URL###'] || (!empty($_GET['tx_ttnews']['tt_news']) && $this->ffConf['d_tt_news'] == 1)){
            $params = array();
            foreach($_GET as $param => $value){
                if (substr($param,0,2) != '__'){
                    $params[$param] = $value;
                }
            }
            $this->marker['###D_URL###'] = t3lib_div::locationHeaderUrl($this->pi_getPageLink($GLOBALS['TSFE']->id,'',$params));
        }
        $this->marker['###D_SHOW_FACES###'] = ($this->marker['###D_SHOW_FACES###'] == 1 ? 'true' : 'false');
        $this->marker['###D_SHARE###'] = ($this->marker['###D_SHARE###'] == 1 ? 'true' : 'false');
        $content .= $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Like Box.
     * http://developers.facebook.com/docs/reference/plugins/like-box/
     *
     * @return	STRING	$content	...
     */
    function displayLikeBox(){
        if($this->ffConf['e_show_in_iframe'] == 1){
            $this->templatePrefix = '_IFRAME';
        } else {
            $content = '';
        }
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_LIKE_BOX'.$this->templatePrefix.'###');
        $this->marker['###E_SHOW_STREAM###'] = ($this->marker['###E_SHOW_STREAM###'] == 1 ? 'true' : 'false');
        $this->marker['###E_SHOW_HEADER###'] = ($this->marker['###E_SHOW_HEADER###'] == 1 ? 'true' : 'false');
        $this->marker['###E_SHOW_FACES###'] = ($this->marker['###E_SHOW_FACES###'] == 1 ? 'true' : 'false');
        $this->marker['###E_SHOW_BORDER###'] = ($this->marker['###E_SHOW_BORDER###'] == 1 ? 'true' : 'false');
        $content .= $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Recommendations plugin.
     * http://developers.facebook.com/docs/reference/plugins/recommendations/
     *
     * @return	STRING	$content	...
     */
    function displayRecommendations(){
        if($this->ffConf['h_show_in_iframe'] == 1){
            $this->templatePrefix = '_IFRAME';
        } else {
            $content = '';
        }
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_RECOMMENDATIONS'.$this->templatePrefix.'###');
        $this->marker['###H_SHOW_HEADER###'] = ($this->marker['###H_SHOW_HEADER###'] == 1 ? 'true' : 'false');
        $content .= $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Send Button.
     * http://developers.facebook.com/docs/reference/plugins/send/
     *
     * @return	STRING	$content	...
     */
    function displaySendButton(){
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_SEND_BUTTON###');
        if(!$this->marker['###I_URL##']){
            $params = array();
            foreach($_GET as $param => $value){
                if (substr($param,0,2) != '__'){
                    $params[$param] = $value;
                }
            }
            $this->marker['###I_URL###'] = t3lib_div::locationHeaderUrl($this->pi_getPageLink($GLOBALS['TSFE']->id,'',$params));
        }
        $content = $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Subscribe Button.
     * http://developers.facebook.com/docs/reference/plugins/subscribe/
     *
     * @return	STRING	$content	...
     */
    function displaySubscribeButton(){
        if($this->ffConf['j_show_in_iframe'] == 1){
            $this->templatePrefix = '_IFRAME';
        } else {
            $content = '';
        }
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_SUBSCRIBE_BUTTON###');
        $this->marker['###J_SHOW_FACES###'] = ($this->marker['###J_SHOW_FACES###'] == 1 ? 'true' : 'false');
        $content = $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays the Share Button.
     * http://developers.facebook.com/docs/plugins/share-button
     *
     * @return	STRING	$content	...
     */
    function displayShareButton(){
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_SHARE_BUTTON###');
        $content = $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }




    /**
     * Displays Embedded posts.
     * https://developers.facebook.com/docs/plugins/embedded-posts
     *
     * @return	STRING	$content	...
     */
    function displayEmbedded(){
        $template = $this->cObj->getSubpart($this->templateFile, '###DISPLAY_EMBEDDED###');
        $content = $this->cObj->substituteMarkerArray($template, $this->marker);
        return $content;
    }



/**
     * This method assigns some default variables to the view
     */
    private function setDefaultViewVars() {

        $this->extKey = "Tp3Social";
    	$this->layout = $this->settings["layout"] ? $this->settings["layout"] : "style05";
    	//$this->cObj = GeneralUtility::makeInstance(TYPO3\\CMS\\Frontend\\ContentObject\\ContentObjectRenderer);
    	$this->pageRenderer = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Page\\PageRenderer');
    	//$this->view->assign('cObjData', $cObjData);
    }
    
}
