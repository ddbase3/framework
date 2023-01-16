<?php return array (
  'Database' => 
  array (
    'interface' => 
    array (
      'Database\\Api\\IDatabase' => 
      array (
        0 => 'Database\\Mysql\\MysqlDatabase',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Database\\Mysql\\MysqlDatabase',
      ),
    ),
  ),
  'Notification' => 
  array (
    'interface' => 
    array (
      'Notification\\Api\\INotification' => 
      array (
        0 => 'Notification\\Pushfleet\\PushfleetNotification',
      ),
    ),
  ),
  'Util' => 
  array (
    'interface' => 
    array (
      'Util\\NeuralNetwork\\INeuralNetworkActFunc' => 
      array (
        0 => 'Util\\NeuralNetwork\\ReluNeuralNetworkActFunc',
        1 => 'Util\\NeuralNetwork\\SigmoidNeuralNetworkActFunc',
      ),
      'Page\\Api\\IPage' => 
      array (
        0 => 'Util\\NeuralNetwork\\Test\\NeuralNetworkTest',
        1 => 'Util\\MailParser\\Test\\MailParserTest',
        2 => 'Util\\Chronos\\Test\\ChronosTest',
        3 => 'Util\\DeviceDetect\\Test\\DeviceDetectTest',
        4 => 'Util\\MobileDetect\\Test\\MobileDetectTest',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Util\\NeuralNetwork\\Test\\NeuralNetworkTest',
        1 => 'Util\\MailParser\\Test\\MailParserTest',
        2 => 'Util\\Chronos\\Test\\ChronosTest',
        3 => 'Util\\DeviceDetect\\Test\\DeviceDetectTest',
        4 => 'Util\\MobileDetect\\Test\\MobileDetectTest',
      ),
      'Api\\IOutput' => 
      array (
        0 => 'Util\\NeuralNetwork\\Test\\NeuralNetworkTest',
        1 => 'Util\\MailParser\\Test\\MailParserTest',
        2 => 'Util\\Chronos\\Test\\ChronosTest',
        3 => 'Util\\DeviceDetect\\Test\\DeviceDetectTest',
        4 => 'Util\\MobileDetect\\Test\\MobileDetectTest',
      ),
      'Util\\NeuralNetwork\\INeuralNetworkWeightInit' => 
      array (
        0 => 'Util\\NeuralNetwork\\RandomNeuralNetworkWeightInit',
      ),
    ),
    'name' => 
    array (
      'neuralnetworktest' => 'Util\\NeuralNetwork\\Test\\NeuralNetworkTest',
      'mailparsertest' => 'Util\\MailParser\\Test\\MailParserTest',
      'chronostest' => 'Util\\Chronos\\Test\\ChronosTest',
      'devicedetecttest' => 'Util\\DeviceDetect\\Test\\DeviceDetectTest',
      'mobiledetecttest' => 'Util\\MobileDetect\\Test\\MobileDetectTest',
    ),
  ),
  'Adviser' => 
  array (
    'interface' => 
    array (
      'Adviser\\Api\\IAdviser' => 
      array (
        0 => 'Adviser\\SimpleNeuralNetwork\\SimpleNeuralNetwork',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Adviser\\SimpleNeuralNetwork\\SimpleNeuralNetwork',
      ),
    ),
    'name' => 
    array (
      'simpleneuralnetwork' => 'Adviser\\SimpleNeuralNetwork\\SimpleNeuralNetwork',
    ),
  ),
  'Microservice' => 
  array (
    'interface' => 
    array (
      'Microservice\\Api\\IMicroserviceHelper' => 
      array (
        0 => 'Microservice\\Microservice\\MicroserviceHelper',
        1 => 'Microservice\\Extern\\MicroserviceExternHelper',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Microservice\\Microservice\\MicroserviceHelper',
        1 => 'Microservice\\Microservice\\MicroserviceConnector',
        2 => 'Microservice\\Extern\\MicroserviceExternConnector',
      ),
      'Microservice\\Api\\IMicroserviceFlags' => 
      array (
        0 => 'Microservice\\Microservice\\MicroserviceConnector',
        1 => 'Microservice\\Extern\\MicroserviceExternConnector',
      ),
      'Microservice\\Api\\IMicroserviceConnector' => 
      array (
        0 => 'Microservice\\Microservice\\MicroserviceConnector',
        1 => 'Microservice\\Extern\\MicroserviceExternConnector',
      ),
      'Api\\IOutput' => 
      array (
        0 => 'Microservice\\MicroserviceReceiver',
        1 => 'Microservice\\Microservice',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Microservice\\MicroserviceReceiver',
        1 => 'Microservice\\Microservice',
      ),
      'Microservice\\Api\\IMicroservice' => 
      array (
        0 => 'Microservice\\MicroserviceReceiver',
      ),
      'Microservice\\Api\\IMicroserviceReceiver' => 
      array (
        0 => 'Microservice\\MicroserviceReceiver',
      ),
    ),
    'name' => 
    array (
      'microservicereceiver' => 'Microservice\\MicroserviceReceiver',
      'microservice' => 'Microservice\\Microservice',
    ),
  ),
  'ServiceSelector' => 
  array (
    'interface' => 
    array (
      'ServiceSelector\\Api\\IServiceSelector' => 
      array (
        0 => 'ServiceSelector\\Standard\\StandardServiceSelector',
        1 => 'ServiceSelector\\LangBased\\LangBasedServiceSelector',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'ServiceSelector\\Standard\\StandardServiceSelector',
        1 => 'ServiceSelector\\LangBased\\LangBasedServiceSelector',
      ),
    ),
  ),
  'Page' => 
  array (
    'interface' => 
    array (
      'Page\\Api\\IPageModuleContent' => 
      array (
        0 => 'Page\\TeaserModule\\Modern\\ModernTeaserModule',
      ),
      'Page\\Api\\IPageModuleDependent' => 
      array (
        0 => 'Page\\TeaserModule\\Modern\\ModernTeaserModule',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Page\\TeaserModule\\Modern\\ModernTeaserModule',
      ),
      'Page\\Api\\IPageModule' => 
      array (
        0 => 'Page\\TeaserModule\\Modern\\ModernTeaserModule',
      ),
    ),
    'name' => 
    array (
      'modernteasermodule' => 'Page\\TeaserModule\\Modern\\ModernTeaserModule',
    ),
  ),
  'File' => 
  array (
    'interface' => 
    array (
      'File\\Api\\IFileservice' => 
      array (
        0 => 'File\\Base\\BaseFileservice',
      ),
    ),
  ),
  'Custom' => 
  array (
    'interface' => 
    array (
      'Page\\Api\\IPageModuleHeader' => 
      array (
        0 => 'Custom\\PageModuleHeader\\CkeditorPageModule',
        1 => 'Custom\\PageModuleHeader\\JqueryUploadFilePageModule',
        2 => 'Custom\\PageModuleHeader\\TouchpunchPageModule',
        3 => 'Custom\\PageModuleHeader\\TitlePageModule',
        4 => 'Custom\\PageModuleHeader\\Base3PageModule',
        5 => 'Custom\\PageModuleHeader\\CmsPageModule',
        6 => 'Custom\\PageModuleHeader\\SearchfilterPageModule',
        7 => 'Custom\\PageModuleHeader\\LeafletPageModule',
        8 => 'Custom\\PageModuleHeader\\JqueryPageModule',
        9 => 'Custom\\PageModuleHeader\\JqueryLightboxPageModule',
        10 => 'Custom\\PageModuleHeader\\JqueryLazyPageModule',
        11 => 'Custom\\PageModuleHeader\\MindmapPageModule',
        12 => 'Custom\\PageModuleHeader\\JqueryCookiebarPageModule',
        13 => 'Custom\\PageModuleHeader\\MultilangPageModule',
        14 => 'Custom\\PageModuleHeader\\JqueryUiPageModule',
        15 => 'Custom\\PageModuleHeader\\BackgroundPageModule',
        16 => 'Custom\\PageModuleHeader\\ComboboxPageModule',
        17 => 'Custom\\PageModuleHeader\\MetaPageModule',
      ),
      'Page\\Api\\IPageModuleDependent' => 
      array (
        0 => 'Custom\\PageModuleHeader\\CkeditorPageModule',
        1 => 'Custom\\PageModuleHeader\\JqueryUploadFilePageModule',
        2 => 'Custom\\PageModuleHeader\\TouchpunchPageModule',
        3 => 'Custom\\PageModuleHeader\\TitlePageModule',
        4 => 'Custom\\PageModuleHeader\\Base3PageModule',
        5 => 'Custom\\PageModuleHeader\\CmsPageModule',
        6 => 'Custom\\PageModuleHeader\\SearchfilterPageModule',
        7 => 'Custom\\PageModuleHeader\\LeafletPageModule',
        8 => 'Custom\\PageModuleHeader\\JqueryPageModule',
        9 => 'Custom\\PageModuleHeader\\JqueryLightboxPageModule',
        10 => 'Custom\\PageModuleHeader\\JqueryLazyPageModule',
        11 => 'Custom\\PageModuleHeader\\MindmapPageModule',
        12 => 'Custom\\PageModuleHeader\\JqueryCookiebarPageModule',
        13 => 'Custom\\PageModuleHeader\\MultilangPageModule',
        14 => 'Custom\\PageModuleHeader\\JqueryUiPageModule',
        15 => 'Custom\\PageModuleHeader\\BackgroundPageModule',
        16 => 'Custom\\PageModuleHeader\\ComboboxPageModule',
        17 => 'Custom\\PageModuleHeader\\MetaPageModule',
        18 => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
        19 => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
        20 => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersPageModule',
        21 => 'Custom\\NeuralNetworkPageModule',
        22 => 'Custom\\PageModuleContent\\LoginBlock',
        23 => 'Custom\\PageModuleContent\\PageContent',
        24 => 'Custom\\PageModuleContent\\PageFooter',
        25 => 'Custom\\PageModuleContent\\GroupUserLoginModule',
        26 => 'Custom\\PageModuleContent\\ParallaxModule',
        27 => 'Custom\\PageModuleContent\\XrmEntryPageModule',
        28 => 'Custom\\PageModuleContent\\RegistrationPageModule',
        29 => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
        30 => 'Custom\\PageModuleContent\\IframeModule',
        31 => 'Custom\\PageModuleContent\\PanoramaModule',
        32 => 'Custom\\PageModuleContent\\LogoutPageModule',
        33 => 'Custom\\PageModuleContent\\LogViewerPageModule',
        34 => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
        35 => 'Custom\\PageModuleContent\\PageHeader',
        36 => 'Custom\\PageModuleContent\\XrmEntryAllocsPageModule',
        37 => 'Custom\\PageModuleContent\\XrmViewer',
        38 => 'Custom\\PageModuleContent\\XrmEntryFormModule',
        39 => 'Custom\\PageModuleContent\\MyAccountPageModule',
        40 => 'Custom\\PageModuleContent\\GalleryModule',
        41 => 'Custom\\PageModuleContent\\XrmListPageModule',
        42 => 'Custom\\PageModuleContent\\CookiesAndSessionsModule',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Custom\\PageModuleHeader\\CkeditorPageModule',
        1 => 'Custom\\PageModuleHeader\\JqueryUploadFilePageModule',
        2 => 'Custom\\PageModuleHeader\\TouchpunchPageModule',
        3 => 'Custom\\PageModuleHeader\\TitlePageModule',
        4 => 'Custom\\PageModuleHeader\\Base3PageModule',
        5 => 'Custom\\PageModuleHeader\\CmsPageModule',
        6 => 'Custom\\PageModuleHeader\\SearchfilterPageModule',
        7 => 'Custom\\PageModuleHeader\\LeafletPageModule',
        8 => 'Custom\\PageModuleHeader\\JqueryPageModule',
        9 => 'Custom\\PageModuleHeader\\JqueryLightboxPageModule',
        10 => 'Custom\\PageModuleHeader\\JqueryLazyPageModule',
        11 => 'Custom\\PageModuleHeader\\MindmapPageModule',
        12 => 'Custom\\PageModuleHeader\\JqueryCookiebarPageModule',
        13 => 'Custom\\PageModuleHeader\\MultilangPageModule',
        14 => 'Custom\\PageModuleHeader\\JqueryUiPageModule',
        15 => 'Custom\\PageModuleHeader\\BackgroundPageModule',
        16 => 'Custom\\PageModuleHeader\\ComboboxPageModule',
        17 => 'Custom\\PageModuleHeader\\MetaPageModule',
        18 => 'Custom\\Job\\AiHandwriteJob',
        19 => 'Custom\\Navigation',
        20 => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
        21 => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
        22 => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersService',
        23 => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersPageModule',
        24 => 'Custom\\Microservice\\AdviserMicroservice',
        25 => 'Custom\\Microservice\\HomepageMicroservice',
        26 => 'Custom\\Page\\Index',
        27 => 'Custom\\Page\\Login',
        28 => 'Custom\\Page\\GeneratedPage',
        29 => 'Custom\\Page\\SelectServiceNavigation',
        30 => 'Custom\\Page\\Embeded',
        31 => 'Custom\\Page\\SingleSignOn',
        32 => 'Custom\\Display\\EmailDisplay',
        33 => 'Custom\\Display\\XrmEntryDisplay',
        34 => 'Custom\\Display\\StreamDisplay',
        35 => 'Custom\\Display\\XrmEntry\\TextXrmEntryDisplay',
        36 => 'Custom\\Display\\XrmEntry\\DocumentTeaserXrmEntryDisplay',
        37 => 'Custom\\Display\\XrmEntry\\ProductXrmEntryDisplay',
        38 => 'Custom\\Display\\XrmEntry\\NoteXrmEntryDisplay',
        39 => 'Custom\\Display\\XrmEntry\\ProjectXrmEntryDisplay',
        40 => 'Custom\\Display\\XrmEntry\\MediaCodeXrmEntryDisplay',
        41 => 'Custom\\Display\\XrmEntry\\DateFolderXrmEntryDisplay',
        42 => 'Custom\\Display\\XrmEntry\\LinkXrmEntryDisplay',
        43 => 'Custom\\Display\\XrmEntry\\AddressXrmEntryDisplay',
        44 => 'Custom\\Display\\XrmEntry\\TagXrmEntryDisplay',
        45 => 'Custom\\Display\\XrmEntry\\CodeXrmEntryDisplay',
        46 => 'Custom\\Display\\XrmEntry\\ContactXrmEntryDisplay',
        47 => 'Custom\\Display\\XrmEntry\\DateXrmEntryDisplay',
        48 => 'Custom\\Display\\XrmEntry\\NoteTeaserXrmEntryDisplay',
        49 => 'Custom\\Display\\XrmEntry\\ResourceXrmEntryDisplay',
        50 => 'Custom\\Display\\XrmEntry\\FileXrmEntryDisplay',
        51 => 'Custom\\Display\\XrmEntry\\FolderXrmEntryDisplay',
        52 => 'Custom\\Display\\Test\\DisplayTest',
        53 => 'Custom\\Display\\FileDisplay',
        54 => 'Custom\\NeuralNetworkGraphic3',
        55 => 'Custom\\NeuralNetworkGraphic',
        56 => 'Custom\\NeuralNetworkPageModule',
        57 => 'Custom\\NeuralNetworkGraphic2',
        58 => 'Custom\\NeuralNetworkDisplay\\NodesNeuralNetworkDisplay',
        59 => 'Custom\\NeuralNetworkDisplay\\RasterNeuralNetworkDisplay',
        60 => 'Custom\\PageModuleContent\\LoginBlock',
        61 => 'Custom\\PageModuleContent\\PageContent',
        62 => 'Custom\\PageModuleContent\\PageFooter',
        63 => 'Custom\\PageModuleContent\\GroupUserLoginModule',
        64 => 'Custom\\PageModuleContent\\ParallaxModule',
        65 => 'Custom\\PageModuleContent\\XrmEntryPageModule',
        66 => 'Custom\\PageModuleContent\\RegistrationPageModule',
        67 => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
        68 => 'Custom\\PageModuleContent\\IframeModule',
        69 => 'Custom\\PageModuleContent\\PanoramaModule',
        70 => 'Custom\\PageModuleContent\\LogoutPageModule',
        71 => 'Custom\\PageModuleContent\\LogViewerPageModule',
        72 => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
        73 => 'Custom\\PageModuleContent\\PageHeader',
        74 => 'Custom\\PageModuleContent\\XrmEntryAllocsPageModule',
        75 => 'Custom\\PageModuleContent\\XrmViewer',
        76 => 'Custom\\PageModuleContent\\XrmEntryFormModule',
        77 => 'Custom\\PageModuleContent\\MyAccountPageModule',
        78 => 'Custom\\PageModuleContent\\GalleryModule',
        79 => 'Custom\\PageModuleContent\\XrmListPageModule',
        80 => 'Custom\\PageModuleContent\\CookiesAndSessionsModule',
      ),
      'Page\\Api\\IPageModule' => 
      array (
        0 => 'Custom\\PageModuleHeader\\CkeditorPageModule',
        1 => 'Custom\\PageModuleHeader\\JqueryUploadFilePageModule',
        2 => 'Custom\\PageModuleHeader\\TouchpunchPageModule',
        3 => 'Custom\\PageModuleHeader\\TitlePageModule',
        4 => 'Custom\\PageModuleHeader\\Base3PageModule',
        5 => 'Custom\\PageModuleHeader\\CmsPageModule',
        6 => 'Custom\\PageModuleHeader\\SearchfilterPageModule',
        7 => 'Custom\\PageModuleHeader\\LeafletPageModule',
        8 => 'Custom\\PageModuleHeader\\JqueryPageModule',
        9 => 'Custom\\PageModuleHeader\\JqueryLightboxPageModule',
        10 => 'Custom\\PageModuleHeader\\JqueryLazyPageModule',
        11 => 'Custom\\PageModuleHeader\\MindmapPageModule',
        12 => 'Custom\\PageModuleHeader\\JqueryCookiebarPageModule',
        13 => 'Custom\\PageModuleHeader\\MultilangPageModule',
        14 => 'Custom\\PageModuleHeader\\JqueryUiPageModule',
        15 => 'Custom\\PageModuleHeader\\BackgroundPageModule',
        16 => 'Custom\\PageModuleHeader\\ComboboxPageModule',
        17 => 'Custom\\PageModuleHeader\\MetaPageModule',
        18 => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
        19 => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
        20 => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersPageModule',
        21 => 'Custom\\NeuralNetworkPageModule',
        22 => 'Custom\\PageModuleContent\\LoginBlock',
        23 => 'Custom\\PageModuleContent\\PageContent',
        24 => 'Custom\\PageModuleContent\\PageFooter',
        25 => 'Custom\\PageModuleContent\\GroupUserLoginModule',
        26 => 'Custom\\PageModuleContent\\ParallaxModule',
        27 => 'Custom\\PageModuleContent\\XrmEntryPageModule',
        28 => 'Custom\\PageModuleContent\\RegistrationPageModule',
        29 => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
        30 => 'Custom\\PageModuleContent\\IframeModule',
        31 => 'Custom\\PageModuleContent\\PanoramaModule',
        32 => 'Custom\\PageModuleContent\\LogoutPageModule',
        33 => 'Custom\\PageModuleContent\\LogViewerPageModule',
        34 => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
        35 => 'Custom\\PageModuleContent\\PageHeader',
        36 => 'Custom\\PageModuleContent\\XrmEntryAllocsPageModule',
        37 => 'Custom\\PageModuleContent\\XrmViewer',
        38 => 'Custom\\PageModuleContent\\XrmEntryFormModule',
        39 => 'Custom\\PageModuleContent\\MyAccountPageModule',
        40 => 'Custom\\PageModuleContent\\GalleryModule',
        41 => 'Custom\\PageModuleContent\\XrmListPageModule',
        42 => 'Custom\\PageModuleContent\\CookiesAndSessionsModule',
      ),
      'Worker\\Api\\IJob' => 
      array (
        0 => 'Custom\\Job\\AiHandwriteJob',
      ),
      'Api\\IOutput' => 
      array (
        0 => 'Custom\\Navigation',
        1 => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
        2 => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
        3 => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersService',
        4 => 'Custom\\Microservice\\AdviserMicroservice',
        5 => 'Custom\\Microservice\\HomepageMicroservice',
        6 => 'Custom\\Page\\Index',
        7 => 'Custom\\Page\\Login',
        8 => 'Custom\\Page\\GeneratedPage',
        9 => 'Custom\\Page\\SelectServiceNavigation',
        10 => 'Custom\\Page\\Embeded',
        11 => 'Custom\\Page\\SingleSignOn',
        12 => 'Custom\\Display\\EmailDisplay',
        13 => 'Custom\\Display\\XrmEntryDisplay',
        14 => 'Custom\\Display\\StreamDisplay',
        15 => 'Custom\\Display\\XrmEntry\\TextXrmEntryDisplay',
        16 => 'Custom\\Display\\XrmEntry\\DocumentTeaserXrmEntryDisplay',
        17 => 'Custom\\Display\\XrmEntry\\ProductXrmEntryDisplay',
        18 => 'Custom\\Display\\XrmEntry\\NoteXrmEntryDisplay',
        19 => 'Custom\\Display\\XrmEntry\\ProjectXrmEntryDisplay',
        20 => 'Custom\\Display\\XrmEntry\\MediaCodeXrmEntryDisplay',
        21 => 'Custom\\Display\\XrmEntry\\DateFolderXrmEntryDisplay',
        22 => 'Custom\\Display\\XrmEntry\\LinkXrmEntryDisplay',
        23 => 'Custom\\Display\\XrmEntry\\AddressXrmEntryDisplay',
        24 => 'Custom\\Display\\XrmEntry\\TagXrmEntryDisplay',
        25 => 'Custom\\Display\\XrmEntry\\CodeXrmEntryDisplay',
        26 => 'Custom\\Display\\XrmEntry\\ContactXrmEntryDisplay',
        27 => 'Custom\\Display\\XrmEntry\\DateXrmEntryDisplay',
        28 => 'Custom\\Display\\XrmEntry\\NoteTeaserXrmEntryDisplay',
        29 => 'Custom\\Display\\XrmEntry\\ResourceXrmEntryDisplay',
        30 => 'Custom\\Display\\XrmEntry\\FileXrmEntryDisplay',
        31 => 'Custom\\Display\\XrmEntry\\FolderXrmEntryDisplay',
        32 => 'Custom\\Display\\Test\\DisplayTest',
        33 => 'Custom\\Display\\FileDisplay',
        34 => 'Custom\\NeuralNetworkGraphic3',
        35 => 'Custom\\NeuralNetworkGraphic',
        36 => 'Custom\\NeuralNetworkGraphic2',
        37 => 'Custom\\NeuralNetworkDisplay\\NodesNeuralNetworkDisplay',
        38 => 'Custom\\NeuralNetworkDisplay\\RasterNeuralNetworkDisplay',
        39 => 'Custom\\PageModuleContent\\LoginBlock',
        40 => 'Custom\\PageModuleContent\\GroupUserLoginModule',
        41 => 'Custom\\PageModuleContent\\RegistrationPageModule',
        42 => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
        43 => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
        44 => 'Custom\\PageModuleContent\\MyAccountPageModule',
        45 => 'Custom\\PageModuleContent\\CookiesAndSessionsModule',
      ),
      'Page\\Api\\IPage' => 
      array (
        0 => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
        1 => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
        2 => 'Custom\\Microservice\\HomepageMicroservice',
        3 => 'Custom\\Page\\Index',
        4 => 'Custom\\Page\\Login',
        5 => 'Custom\\Page\\GeneratedPage',
        6 => 'Custom\\Page\\SingleSignOn',
        7 => 'Custom\\Display\\Test\\DisplayTest',
        8 => 'Custom\\PageModuleContent\\LoginBlock',
        9 => 'Custom\\PageModuleContent\\GroupUserLoginModule',
        10 => 'Custom\\PageModuleContent\\RegistrationPageModule',
        11 => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
        12 => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
        13 => 'Custom\\PageModuleContent\\MyAccountPageModule',
        14 => 'Custom\\PageModuleContent\\CookiesAndSessionsModule',
      ),
      'Page\\Api\\IPagePostDataProcessor' => 
      array (
        0 => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
        1 => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
        2 => 'Custom\\PageModuleContent\\LoginBlock',
        3 => 'Custom\\PageModuleContent\\GroupUserLoginModule',
        4 => 'Custom\\PageModuleContent\\RegistrationPageModule',
        5 => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
        6 => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
        7 => 'Custom\\PageModuleContent\\MyAccountPageModule',
      ),
      'Page\\Api\\IPageModuleContent' => 
      array (
        0 => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
        1 => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
        2 => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersPageModule',
        3 => 'Custom\\NeuralNetworkPageModule',
        4 => 'Custom\\PageModuleContent\\LoginBlock',
        5 => 'Custom\\PageModuleContent\\PageContent',
        6 => 'Custom\\PageModuleContent\\PageFooter',
        7 => 'Custom\\PageModuleContent\\GroupUserLoginModule',
        8 => 'Custom\\PageModuleContent\\ParallaxModule',
        9 => 'Custom\\PageModuleContent\\XrmEntryPageModule',
        10 => 'Custom\\PageModuleContent\\RegistrationPageModule',
        11 => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
        12 => 'Custom\\PageModuleContent\\IframeModule',
        13 => 'Custom\\PageModuleContent\\PanoramaModule',
        14 => 'Custom\\PageModuleContent\\LogoutPageModule',
        15 => 'Custom\\PageModuleContent\\LogViewerPageModule',
        16 => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
        17 => 'Custom\\PageModuleContent\\PageHeader',
        18 => 'Custom\\PageModuleContent\\XrmEntryAllocsPageModule',
        19 => 'Custom\\PageModuleContent\\XrmViewer',
        20 => 'Custom\\PageModuleContent\\XrmEntryFormModule',
        21 => 'Custom\\PageModuleContent\\MyAccountPageModule',
        22 => 'Custom\\PageModuleContent\\GalleryModule',
        23 => 'Custom\\PageModuleContent\\XrmListPageModule',
        24 => 'Custom\\PageModuleContent\\CookiesAndSessionsModule',
      ),
      'Microservice\\Api\\IMicroservice' => 
      array (
        0 => 'Custom\\Microservice\\AdviserMicroservice',
        1 => 'Custom\\Microservice\\HomepageMicroservice',
      ),
      'Adviser\\Api\\IAdviser' => 
      array (
        0 => 'Custom\\Microservice\\AdviserMicroservice',
      ),
      'Page\\Api\\IPageCatchall' => 
      array (
        0 => 'Custom\\Page\\Index',
        1 => 'Custom\\Page\\Login',
        2 => 'Custom\\Page\\GeneratedPage',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Custom\\Page\\SingleSignOn',
      ),
      'Api\\IDisplay' => 
      array (
        0 => 'Custom\\Display\\EmailDisplay',
        1 => 'Custom\\Display\\XrmEntryDisplay',
        2 => 'Custom\\Display\\StreamDisplay',
        3 => 'Custom\\Display\\XrmEntry\\TextXrmEntryDisplay',
        4 => 'Custom\\Display\\XrmEntry\\DocumentTeaserXrmEntryDisplay',
        5 => 'Custom\\Display\\XrmEntry\\ProductXrmEntryDisplay',
        6 => 'Custom\\Display\\XrmEntry\\NoteXrmEntryDisplay',
        7 => 'Custom\\Display\\XrmEntry\\ProjectXrmEntryDisplay',
        8 => 'Custom\\Display\\XrmEntry\\MediaCodeXrmEntryDisplay',
        9 => 'Custom\\Display\\XrmEntry\\DateFolderXrmEntryDisplay',
        10 => 'Custom\\Display\\XrmEntry\\LinkXrmEntryDisplay',
        11 => 'Custom\\Display\\XrmEntry\\AddressXrmEntryDisplay',
        12 => 'Custom\\Display\\XrmEntry\\TagXrmEntryDisplay',
        13 => 'Custom\\Display\\XrmEntry\\CodeXrmEntryDisplay',
        14 => 'Custom\\Display\\XrmEntry\\ContactXrmEntryDisplay',
        15 => 'Custom\\Display\\XrmEntry\\DateXrmEntryDisplay',
        16 => 'Custom\\Display\\XrmEntry\\NoteTeaserXrmEntryDisplay',
        17 => 'Custom\\Display\\XrmEntry\\ResourceXrmEntryDisplay',
        18 => 'Custom\\Display\\XrmEntry\\FileXrmEntryDisplay',
        19 => 'Custom\\Display\\XrmEntry\\FolderXrmEntryDisplay',
        20 => 'Custom\\Display\\FileDisplay',
        21 => 'Custom\\NeuralNetworkDisplay\\NodesNeuralNetworkDisplay',
        22 => 'Custom\\NeuralNetworkDisplay\\RasterNeuralNetworkDisplay',
      ),
    ),
    'name' => 
    array (
      'ckeditorpagemodule' => 'Custom\\PageModuleHeader\\CkeditorPageModule',
      'jqueryuploadfilepagemodule' => 'Custom\\PageModuleHeader\\JqueryUploadFilePageModule',
      'touchpunchpagemodule' => 'Custom\\PageModuleHeader\\TouchpunchPageModule',
      'titlepagemodule' => 'Custom\\PageModuleHeader\\TitlePageModule',
      'base3pagemodule' => 'Custom\\PageModuleHeader\\Base3PageModule',
      'cmspagemodule' => 'Custom\\PageModuleHeader\\CmsPageModule',
      'searchfilterpagemodule' => 'Custom\\PageModuleHeader\\SearchfilterPageModule',
      'leafletpagemodule' => 'Custom\\PageModuleHeader\\LeafletPageModule',
      'jquerypagemodule' => 'Custom\\PageModuleHeader\\JqueryPageModule',
      'jquerylightboxpagemodule' => 'Custom\\PageModuleHeader\\JqueryLightboxPageModule',
      'jquerylazypagemodule' => 'Custom\\PageModuleHeader\\JqueryLazyPageModule',
      'mindmappagemodule' => 'Custom\\PageModuleHeader\\MindmapPageModule',
      'jquerycookiebarpagemodule' => 'Custom\\PageModuleHeader\\JqueryCookiebarPageModule',
      'multilangpagemodule' => 'Custom\\PageModuleHeader\\MultilangPageModule',
      'jqueryuipagemodule' => 'Custom\\PageModuleHeader\\JqueryUiPageModule',
      'backgroundpagemodule' => 'Custom\\PageModuleHeader\\BackgroundPageModule',
      'comboboxpagemodule' => 'Custom\\PageModuleHeader\\ComboboxPageModule',
      'metapagemodule' => 'Custom\\PageModuleHeader\\MetaPageModule',
      'aihandwritejob' => 'Custom\\Job\\AiHandwriteJob',
      'navigation' => 'Custom\\Navigation',
      'neuralnetworkseminaradminpagemodule' => 'Custom\\Seminar\\NeuralNetworkSeminarAdminPageModule',
      'neuralnetworkseminarsketchpad' => 'Custom\\Seminar\\NeuralNetworkSeminarSketchpad',
      'neuralnetworkseminarawaitinghandwrittennumbersservice' => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersService',
      'neuralnetworkseminarawaitinghandwrittennumberspagemodule' => 'Custom\\Seminar\\NeuralNetworkSeminarAwaitingHandwrittenNumbersPageModule',
      'advisermicroservice' => 'Custom\\Microservice\\AdviserMicroservice',
      'homepagemicroservice' => 'Custom\\Microservice\\HomepageMicroservice',
      'index' => 'Custom\\Page\\Index',
      'login' => 'Custom\\Page\\Login',
      'generatedpage' => 'Custom\\Page\\GeneratedPage',
      'selectservicenavigation' => 'Custom\\Page\\SelectServiceNavigation',
      'embeded' => 'Custom\\Page\\Embeded',
      'singlesignon' => 'Custom\\Page\\SingleSignOn',
      'emaildisplay' => 'Custom\\Display\\EmailDisplay',
      'xrmentrydisplay' => 'Custom\\Display\\XrmEntryDisplay',
      'streamdisplay' => 'Custom\\Display\\StreamDisplay',
      'textxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\TextXrmEntryDisplay',
      'documentteaserxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\DocumentTeaserXrmEntryDisplay',
      'productxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\ProductXrmEntryDisplay',
      'notexrmentrydisplay' => 'Custom\\Display\\XrmEntry\\NoteXrmEntryDisplay',
      'projectxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\ProjectXrmEntryDisplay',
      'mediacodexrmentrydisplay' => 'Custom\\Display\\XrmEntry\\MediaCodeXrmEntryDisplay',
      'datefolderxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\DateFolderXrmEntryDisplay',
      'linkxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\LinkXrmEntryDisplay',
      'addressxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\AddressXrmEntryDisplay',
      'tagxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\TagXrmEntryDisplay',
      'codexrmentrydisplay' => 'Custom\\Display\\XrmEntry\\CodeXrmEntryDisplay',
      'contactxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\ContactXrmEntryDisplay',
      'datexrmentrydisplay' => 'Custom\\Display\\XrmEntry\\DateXrmEntryDisplay',
      'noteteaserxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\NoteTeaserXrmEntryDisplay',
      'resourcexrmentrydisplay' => 'Custom\\Display\\XrmEntry\\ResourceXrmEntryDisplay',
      'filexrmentrydisplay' => 'Custom\\Display\\XrmEntry\\FileXrmEntryDisplay',
      'folderxrmentrydisplay' => 'Custom\\Display\\XrmEntry\\FolderXrmEntryDisplay',
      'displaytest' => 'Custom\\Display\\Test\\DisplayTest',
      'filedisplay' => 'Custom\\Display\\FileDisplay',
      'neuralnetworkgraphic3' => 'Custom\\NeuralNetworkGraphic3',
      'neuralnetworkgraphic' => 'Custom\\NeuralNetworkGraphic',
      'neuralnetworkpagemodule' => 'Custom\\NeuralNetworkPageModule',
      'neuralnetworkgraphic2' => 'Custom\\NeuralNetworkGraphic2',
      'nodesneuralnetworkdisplay' => 'Custom\\NeuralNetworkDisplay\\NodesNeuralNetworkDisplay',
      'rasterneuralnetworkdisplay' => 'Custom\\NeuralNetworkDisplay\\RasterNeuralNetworkDisplay',
      'loginblock' => 'Custom\\PageModuleContent\\LoginBlock',
      'pagecontent' => 'Custom\\PageModuleContent\\PageContent',
      'pagefooter' => 'Custom\\PageModuleContent\\PageFooter',
      'groupuserloginmodule' => 'Custom\\PageModuleContent\\GroupUserLoginModule',
      'parallaxmodule' => 'Custom\\PageModuleContent\\ParallaxModule',
      'xrmentrypagemodule' => 'Custom\\PageModuleContent\\XrmEntryPageModule',
      'registrationpagemodule' => 'Custom\\PageModuleContent\\RegistrationPageModule',
      'forgottenpasswordpagemodule' => 'Custom\\PageModuleContent\\ForgottenPasswordPageModule',
      'iframemodule' => 'Custom\\PageModuleContent\\IframeModule',
      'panoramamodule' => 'Custom\\PageModuleContent\\PanoramaModule',
      'logoutpagemodule' => 'Custom\\PageModuleContent\\LogoutPageModule',
      'logviewerpagemodule' => 'Custom\\PageModuleContent\\LogViewerPageModule',
      'changepasswordpagemodule' => 'Custom\\PageModuleContent\\ChangePasswordPageModule',
      'pageheader' => 'Custom\\PageModuleContent\\PageHeader',
      'xrmentryallocspagemodule' => 'Custom\\PageModuleContent\\XrmEntryAllocsPageModule',
      'xrmviewer' => 'Custom\\PageModuleContent\\XrmViewer',
      'xrmentryformmodule' => 'Custom\\PageModuleContent\\XrmEntryFormModule',
      'myaccountpagemodule' => 'Custom\\PageModuleContent\\MyAccountPageModule',
      'gallerymodule' => 'Custom\\PageModuleContent\\GalleryModule',
      'xrmlistpagemodule' => 'Custom\\PageModuleContent\\XrmListPageModule',
      'cookiesandsessionsmodule' => 'Custom\\PageModuleContent\\CookiesAndSessionsModule',
    ),
  ),
  'Xrm' => 
  array (
    'interface' => 
    array (
      'Xrm\\Api\\IXrmFilterModule' => 
      array (
        0 => 'Xrm\\TypeXrmFilterModule',
        1 => 'Xrm\\ArchiveXrmFilterModule',
        2 => 'Xrm\\LogXrmFilterModule',
        3 => 'Xrm\\Master\\MasterXrmFilterModule',
        4 => 'Xrm\\File\\FileArchiveXrmFilterModule',
        5 => 'Xrm\\File\\FileTagXrmFilterModule',
        6 => 'Xrm\\TagXrmFilterModule',
        7 => 'Xrm\\NameXrmFilterModule',
        8 => 'Xrm\\AllocXrmFilterModule',
        9 => 'Xrm\\BaseXrmFilterModule',
        10 => 'Xrm\\Simple\\SimpleLogXrmFilterModule',
        11 => 'Xrm\\Simple\\SimpleArchiveXrmFilterModule',
        12 => 'Xrm\\Simple\\SimpleNameXrmFilterModule',
        13 => 'Xrm\\Simple\\SimpleTagXrmFilterModule',
        14 => 'Xrm\\ConjXrmFilterModule',
        15 => 'Xrm\\Base3\\Base3TagXrmFilterModule',
        16 => 'Xrm\\Base3\\Base3LogXrmFilterModule',
        17 => 'Xrm\\Base3\\Base3ArchiveXrmFilterModule',
        18 => 'Xrm\\Base3\\Base3NameXrmFilterModule',
        19 => 'Xrm\\Cache\\CacheArchiveXrmFilterModule',
        20 => 'Xrm\\Cache\\CacheLogXrmFilterModule',
        21 => 'Xrm\\Cache\\CacheNameXrmFilterModule',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Xrm\\TypeXrmFilterModule',
        1 => 'Xrm\\ArchiveXrmFilterModule',
        2 => 'Xrm\\DelegateXrmMicroservice',
        3 => 'Xrm\\LogXrmFilterModule',
        4 => 'Xrm\\Master\\MasterXrmFilterModule',
        5 => 'Xrm\\File\\FileArchiveXrmFilterModule',
        6 => 'Xrm\\File\\FileTagXrmFilterModule',
        7 => 'Xrm\\TagXrmFilterModule',
        8 => 'Xrm\\NameXrmFilterModule',
        9 => 'Xrm\\AllocXrmFilterModule',
        10 => 'Xrm\\BaseXrmFilterModule',
        11 => 'Xrm\\XrmSearchService',
        12 => 'Xrm\\Simple\\SimpleLogXrmFilterModule',
        13 => 'Xrm\\Simple\\SimpleArchiveXrmFilterModule',
        14 => 'Xrm\\Simple\\SimpleNameXrmFilterModule',
        15 => 'Xrm\\Simple\\SimpleTagXrmFilterModule',
        16 => 'Xrm\\ConjXrmFilterModule',
        17 => 'Xrm\\Base3\\Base3TagXrmFilterModule',
        18 => 'Xrm\\Base3\\Base3LogXrmFilterModule',
        19 => 'Xrm\\Base3\\Base3ArchiveXrmFilterModule',
        20 => 'Xrm\\Base3\\Base3NameXrmFilterModule',
        21 => 'Xrm\\Cache\\CacheArchiveXrmFilterModule',
        22 => 'Xrm\\Cache\\CacheLogXrmFilterModule',
        23 => 'Xrm\\Cache\\CacheNameXrmFilterModule',
      ),
      'Api\\IOutput' => 
      array (
        0 => 'Xrm\\DelegateXrmMicroservice',
        1 => 'Xrm\\XrmSearchService',
      ),
      'Microservice\\Api\\IMicroservice' => 
      array (
        0 => 'Xrm\\DelegateXrmMicroservice',
      ),
      'Xrm\\Api\\IXrm' => 
      array (
        0 => 'Xrm\\DelegateXrmMicroservice',
        1 => 'Xrm\\Master\\MasterXrm',
        2 => 'Xrm\\File\\FileXrm',
        3 => 'Xrm\\Media\\MediaXrm',
        4 => 'Xrm\\Simple\\SimpleXrm',
        5 => 'Xrm\\Base3\\Base3Xrm',
        6 => 'Xrm\\Cache\\CacheXrm',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Xrm\\Master\\MasterXrm',
        1 => 'Xrm\\File\\FileXrm',
        2 => 'Xrm\\Media\\MediaXrm',
        3 => 'Xrm\\Simple\\SimpleXrm',
        4 => 'Xrm\\Base3\\Base3Xrm',
        5 => 'Xrm\\Cache\\CacheXrm',
      ),
    ),
    'name' => 
    array (
      'typexrmfiltermodule' => 'Xrm\\TypeXrmFilterModule',
      'archivexrmfiltermodule' => 'Xrm\\ArchiveXrmFilterModule',
      'delegatexrmmicroservice' => 'Xrm\\DelegateXrmMicroservice',
      'logxrmfiltermodule' => 'Xrm\\LogXrmFilterModule',
      'masterxrmfiltermodule' => 'Xrm\\Master\\MasterXrmFilterModule',
      'filearchivexrmfiltermodule' => 'Xrm\\File\\FileArchiveXrmFilterModule',
      'filetagxrmfiltermodule' => 'Xrm\\File\\FileTagXrmFilterModule',
      'tagxrmfiltermodule' => 'Xrm\\TagXrmFilterModule',
      'namexrmfiltermodule' => 'Xrm\\NameXrmFilterModule',
      'allocxrmfiltermodule' => 'Xrm\\AllocXrmFilterModule',
      'basexrmfiltermodule' => 'Xrm\\BaseXrmFilterModule',
      'xrmsearchservice' => 'Xrm\\XrmSearchService',
      'simplelogxrmfiltermodule' => 'Xrm\\Simple\\SimpleLogXrmFilterModule',
      'simplearchivexrmfiltermodule' => 'Xrm\\Simple\\SimpleArchiveXrmFilterModule',
      'simplenamexrmfiltermodule' => 'Xrm\\Simple\\SimpleNameXrmFilterModule',
      'simpletagxrmfiltermodule' => 'Xrm\\Simple\\SimpleTagXrmFilterModule',
      'conjxrmfiltermodule' => 'Xrm\\ConjXrmFilterModule',
      'base3tagxrmfiltermodule' => 'Xrm\\Base3\\Base3TagXrmFilterModule',
      'base3logxrmfiltermodule' => 'Xrm\\Base3\\Base3LogXrmFilterModule',
      'base3archivexrmfiltermodule' => 'Xrm\\Base3\\Base3ArchiveXrmFilterModule',
      'base3namexrmfiltermodule' => 'Xrm\\Base3\\Base3NameXrmFilterModule',
      'cachearchivexrmfiltermodule' => 'Xrm\\Cache\\CacheArchiveXrmFilterModule',
      'cachelogxrmfiltermodule' => 'Xrm\\Cache\\CacheLogXrmFilterModule',
      'cachenamexrmfiltermodule' => 'Xrm\\Cache\\CacheNameXrmFilterModule',
    ),
  ),
  'Session' => 
  array (
    'interface' => 
    array (
      'Session\\Api\\ISession' => 
      array (
        0 => 'Session\\DomainSession\\DomainSession',
        1 => 'Session\\BasicSession\\BasicSession',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Session\\DomainSession\\DomainSession',
        1 => 'Session\\BasicSession\\BasicSession',
      ),
    ),
  ),
  'Observation' => 
  array (
    'interface' => 
    array (
      'Observation\\Api\\IObservation' => 
      array (
        0 => 'Observation\\Base\\Observation',
      ),
    ),
  ),
  'Configuration' => 
  array (
    'interface' => 
    array (
      'Configuration\\Api\\IConfiguration' => 
      array (
        0 => 'Configuration\\ConfigFile\\ConfigFile',
      ),
    ),
  ),
  'Mailer' => 
  array (
    'interface' => 
    array (
      'Mailer\\Api\\IMailer' => 
      array (
        0 => 'Mailer\\Internal\\InternalMailer',
        1 => 'Mailer\\Full\\FullMailer',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Mailer\\Full\\FullMailer',
      ),
      'Mailer\\Api\\IMail' => 
      array (
        0 => 'Mailer\\Mail',
      ),
    ),
  ),
  'Accesscontrol' => 
  array (
    'interface' => 
    array (
      'Accesscontrol\\Api\\IAccesscontrol' => 
      array (
        0 => 'Accesscontrol\\Custom\\CustomAccesscontrol',
        1 => 'Accesscontrol\\Selected\\SelectedAccesscontrol',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Accesscontrol\\Custom\\CustomAccesscontrol',
        1 => 'Accesscontrol\\Authentication\\Base3SystemAuth',
        2 => 'Accesscontrol\\Authentication\\SingleSignOnAutoAuth',
        3 => 'Accesscontrol\\Authentication\\SingleSignOnAuth',
        4 => 'Accesscontrol\\Authentication\\SingleSignOnServerAuth',
        5 => 'Accesscontrol\\Authentication\\CookieAuth',
        6 => 'Accesscontrol\\Authentication\\InternalHmacAuth',
        7 => 'Accesscontrol\\Authentication\\SessionAuth',
        8 => 'Accesscontrol\\Authentication\\SingleAuth',
        9 => 'Accesscontrol\\Selected\\SelectedAccesscontrol',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Accesscontrol\\Authentication\\CliAuth',
        1 => 'Accesscontrol\\Authentication\\Base3SystemAuth',
        2 => 'Accesscontrol\\Authentication\\SingleSignOnAutoAuth',
        3 => 'Accesscontrol\\Authentication\\QuickAuth',
        4 => 'Accesscontrol\\Authentication\\SingleSignOnAuth',
        5 => 'Accesscontrol\\Authentication\\ContinueAuth',
        6 => 'Accesscontrol\\Authentication\\SingleSignOnServerAuth',
        7 => 'Accesscontrol\\Authentication\\CookieAuth',
        8 => 'Accesscontrol\\Authentication\\InternalHmacAuth',
        9 => 'Accesscontrol\\Authentication\\GroupUserAuth',
        10 => 'Accesscontrol\\Authentication\\SessionAuth',
        11 => 'Accesscontrol\\Authentication\\SingleAuth',
      ),
      'Accesscontrol\\Api\\IAuthentication' => 
      array (
        0 => 'Accesscontrol\\Authentication\\CliAuth',
        1 => 'Accesscontrol\\Authentication\\Base3SystemAuth',
        2 => 'Accesscontrol\\Authentication\\SingleSignOnAutoAuth',
        3 => 'Accesscontrol\\Authentication\\QuickAuth',
        4 => 'Accesscontrol\\Authentication\\SingleSignOnAuth',
        5 => 'Accesscontrol\\Authentication\\ContinueAuth',
        6 => 'Accesscontrol\\Authentication\\SingleSignOnServerAuth',
        7 => 'Accesscontrol\\Authentication\\CookieAuth',
        8 => 'Accesscontrol\\Authentication\\InternalHmacAuth',
        9 => 'Accesscontrol\\Authentication\\GroupUserAuth',
        10 => 'Accesscontrol\\Authentication\\SessionAuth',
        11 => 'Accesscontrol\\Authentication\\SingleAuth',
      ),
    ),
    'name' => 
    array (
      'cliauth' => 'Accesscontrol\\Authentication\\CliAuth',
      'base3systemauth' => 'Accesscontrol\\Authentication\\Base3SystemAuth',
      'singlesignonautoauth' => 'Accesscontrol\\Authentication\\SingleSignOnAutoAuth',
      'quickauth' => 'Accesscontrol\\Authentication\\QuickAuth',
      'singlesignonauth' => 'Accesscontrol\\Authentication\\SingleSignOnAuth',
      'continueauth' => 'Accesscontrol\\Authentication\\ContinueAuth',
      'singlesignonserverauth' => 'Accesscontrol\\Authentication\\SingleSignOnServerAuth',
      'cookieauth' => 'Accesscontrol\\Authentication\\CookieAuth',
      'internalhmacauth' => 'Accesscontrol\\Authentication\\InternalHmacAuth',
      'groupuserauth' => 'Accesscontrol\\Authentication\\GroupUserAuth',
      'sessionauth' => 'Accesscontrol\\Authentication\\SessionAuth',
      'singleauth' => 'Accesscontrol\\Authentication\\SingleAuth',
    ),
  ),
  'Scriptlock' => 
  array (
    'interface' => 
    array (
      'Scriptlock\\Api\\IScriptlock' => 
      array (
        0 => 'Scriptlock\\None\\ScriptlockNone',
        1 => 'Scriptlock\\Custom\\ScriptlockCustom',
        2 => 'Scriptlock\\Base\\ScriptlockBase',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Scriptlock\\Custom\\ScriptlockCustom',
      ),
    ),
  ),
  'Usermanager' => 
  array (
    'interface' => 
    array (
      'Usermanager\\Api\\IUsermanager' => 
      array (
        0 => 'Usermanager\\Base3System\\Base3SystemUsermanager',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Usermanager\\Base3System\\Base3SystemUsermanager',
      ),
    ),
  ),
  'Crypt' => 
  array (
    'interface' => 
    array (
      'Crypt\\Api\\ICrypt' => 
      array (
        0 => 'Crypt\\Openssl\\OpensslCrypt',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Crypt\\Openssl\\OpensslCrypt',
      ),
    ),
  ),
  'Language' => 
  array (
    'interface' => 
    array (
      'Language\\Api\\ILanguage' => 
      array (
        0 => 'Language\\MultiLang\\MultiLang',
        1 => 'Language\\SingleLang\\SingleLang',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Language\\MultiLang\\MultiLang',
        1 => 'Language\\SingleLang\\SingleLang',
      ),
    ),
  ),
  'Status' => 
  array (
    'interface' => 
    array (
      'Status\\Api\\IStatusHandler' => 
      array (
        0 => 'Status\\File\\FileStatusHandler',
        1 => 'Status\\Session\\SessionStatusHandler',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Status\\File\\FileStatusHandler',
        1 => 'Status\\Session\\SessionStatusHandler',
      ),
    ),
  ),
  'Logger' => 
  array (
    'interface' => 
    array (
      'Logger\\Api\\ILogger' => 
      array (
        0 => 'Logger\\FileLogger\\FileLogger',
      ),
    ),
  ),
  'Desktop' => 
  array (
    'interface' => 
    array (
      'Desktop\\Api\\IDesktop' => 
      array (
        0 => 'Desktop\\Base\\BaseDesktop',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Desktop\\Base\\BaseDesktop',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Desktop\\Base\\BaseDesktop',
      ),
    ),
    'name' => 
    array (
      'basedesktop' => 'Desktop\\Base\\BaseDesktop',
    ),
  ),
  'Search' => 
  array (
    'interface' => 
    array (
      'Search\\Api\\ISearchProvider' => 
      array (
        0 => 'Search\\Custom\\CustomSearchProvider',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Search\\Custom\\CustomSearchProvider',
      ),
      'Api\\IOutput' => 
      array (
        0 => 'Search\\Custom\\CustomSearchProvider',
      ),
    ),
    'name' => 
    array (
      'customsearchprovider' => 'Search\\Custom\\CustomSearchProvider',
    ),
  ),
  'Token' => 
  array (
    'interface' => 
    array (
      'Token\\Api\\IToken' => 
      array (
        0 => 'Token\\FileToken\\FileToken',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Token\\FileToken\\FileToken',
      ),
    ),
  ),
  'Base3' => 
  array (
    'interface' => 
    array (
      'Api\\IOutput' => 
      array (
        0 => 'Base3\\Check',
        1 => 'Base3\\PhpInfo',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Base3\\Check',
        1 => 'Base3\\PhpInfo',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Base3\\Check',
      ),
    ),
    'name' => 
    array (
      'check' => 'Base3\\Check',
      'phpinfo' => 'Base3\\PhpInfo',
    ),
  ),
  'Knowledge' => 
  array (
    'interface' => 
    array (
      'Knowledge\\Api\\IKnowledge' => 
      array (
        0 => 'Knowledge\\Source\\KnowledgeSource',
        1 => 'Knowledge\\DevStatusMicroservice',
      ),
      'Api\\IOutput' => 
      array (
        0 => 'Knowledge\\DevStatusMicroservice',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Knowledge\\DevStatusMicroservice',
      ),
      'Microservice\\Api\\IMicroservice' => 
      array (
        0 => 'Knowledge\\DevStatusMicroservice',
      ),
    ),
    'name' => 
    array (
      'devstatusmicroservice' => 'Knowledge\\DevStatusMicroservice',
    ),
  ),
  'Worker' => 
  array (
    'interface' => 
    array (
      'Api\\IOutput' => 
      array (
        0 => 'Worker\\DelegateWorkerMicroservice',
        1 => 'Worker\\MasterWorker',
        2 => 'Worker\\TestJob',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Worker\\DelegateWorkerMicroservice',
        1 => 'Worker\\DelegateWorker',
        2 => 'Worker\\MasterWorker',
        3 => 'Worker\\TestJob',
      ),
      'Microservice\\Api\\IMicroservice' => 
      array (
        0 => 'Worker\\DelegateWorkerMicroservice',
      ),
      'Worker\\Api\\IWorker' => 
      array (
        0 => 'Worker\\DelegateWorkerMicroservice',
        1 => 'Worker\\DelegateWorker',
      ),
      'Api\\ICheck' => 
      array (
        0 => 'Worker\\DelegateWorker',
      ),
    ),
    'name' => 
    array (
      'delegateworkermicroservice' => 'Worker\\DelegateWorkerMicroservice',
      'delegateworker' => 'Worker\\DelegateWorker',
      'masterworker' => 'Worker\\MasterWorker',
      'testjob' => 'Worker\\TestJob',
    ),
  ),
  'Cache' => 
  array (
    'interface' => 
    array (
      'Cache\\Api\\ICache' => 
      array (
        0 => 'Cache\\FileCache',
        1 => 'Cache\\DelegateCacheMicroservice',
      ),
      'Api\\IOutput' => 
      array (
        0 => 'Cache\\DelegateCacheMicroservice',
      ),
      'Api\\IBase' => 
      array (
        0 => 'Cache\\DelegateCacheMicroservice',
      ),
      'Microservice\\Api\\IMicroservice' => 
      array (
        0 => 'Cache\\DelegateCacheMicroservice',
      ),
    ),
    'name' => 
    array (
      'delegatecachemicroservice' => 'Cache\\DelegateCacheMicroservice',
    ),
  ),
);
