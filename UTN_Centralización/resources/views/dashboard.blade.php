<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>{{trans('validation.attributes.UTN')}}</title>
    
   
  
    <!-- end: Meta -->
    
    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->
    
    <!-- start: CSS -->
   <!-- <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">-->
    {!!Html::style('css/bootstrap.min.css', ['id'=>'bootstrap-style']) !!}
    <!--<link href="css/bootstrap-responsive.min.css" rel="stylesheet">-->
    {!!Html::style('css/bootstrap-responsive.min.css') !!}
    <!--<link id="base-style" href="css/style.css" rel="stylesheet">-->
    {!!Html::style('css/style.css', ['id'=>'base-style']) !!}
    <!--<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">-->
     {!!Html::style('css/style-responsive.css', ['id'=>'base-style-responsive']) !!}
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>-->
    {!!Html::style('css/css.css') !!}
    {!!Html::style('css/modification.css') !!}
    {!!Html::style('css/cangas.datepicker.css') !!}
     {!!Html::style('css/jquery-ui.css') !!}
    {!!Html::style('css/jquery-ui.structure.css') !!}
    {!!Html::style('css/jquery-ui.theme.css') !!}
    <!-- end: CSS -->
    

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <link id="ie-style" href="css/ie.css" rel="stylesheet">
    <![endif]-->
    
    <!--[if IE 9]>
        <link id="ie9style" href="css/ie9.css" rel="stylesheet">
    <![endif]-->
        
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->
    
        
        
        
</head>

<body>
        <!-- start: Header -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href=""><span><?php
                       
                        echo(Auth::user()->getNameEntity());
                    ?></span></a>
                                
                <!-- start: Header Menu -->
                <div class="nav-no-collapse header-nav">
                    <ul class="nav pull-right">
                        
                        <!-- start: Notifications Dropdown -->
                        
                        <!-- end: Notifications Dropdown -->
                        <!-- start: Message Dropdown -->
                        
                        <!-- end: Message Dropdown -->
                       
                        <!-- start: User Dropdown -->
                        <li class="dropdown">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="halflings-icon white user"></i> {{Auth::user()->full_name}}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                
                                
                                <li><a href="/auth/logout"><i class="halflings-icon off"></i> {{trans('validation.attributes.logout')}}</a></li>
                            </ul>
                        </li>
                        <!-- end: User Dropdown -->
                    </ul>
                </div>
                <!-- end: Header Menu -->
                
            </div>
        </div>
    </div>
    <!-- start: Header -->
    
        <div class="container-fluid-full">
        <div class="row-fluid">
                
            <!-- start: Main Menu -->
           @yield('nav')
            <!-- end: Main Menu -->
            
           
            
            <!-- start: Content -->
            <div id="content" class="span10" >
            
            
            
     

           
            
                 
                        
           
          
            @yield('body')
       

    </div><!--/.fluid-container-->
    
            <!-- end: Content -->
        </div><!--/#content.span10-->
        </div><!--/fluid-row-->
        
   
    
    <div class="clearfix"></div>
    
    <footer>

        <p>
            <span style="text-align:left;float:left">&copy; 2015 <a href="http://www.utn.ac.cr/" alt="Bootstrap_Metro_Dashboard">{{trans('validation.attributes.UTN')}}</a></span>
            
        </p>

    </footer>
    
    <!-- start: JavaScript-->

        {!! Html::script('js/jquery-1.9.1.min.js') !!}

        {!! Html::script('js/jquery-migrate-1.0.0.min.js') !!}
        {!! Html::script('js/jquery-ui-1.10.0.custom.min.js') !!}
            
       
        {!! Html::script('js/jquery.ui.touch-punch.js') !!}
        
        {!! Html::script('js/modernizr.js') !!}
        
        {!! Html::script('js/bootstrap.min.js') !!}
        
        {!! Html::script('js/jquery.cookie.js') !!}
        
        {!! Html::script('js/fullcalendar.min.js') !!}
        
        {!! Html::script('js/jquery.dataTables.js') !!}
       
        {!! Html::script('js/excanvas.js') !!}
    
    {!! Html::script('js/jquery.flot.js') !!}
    
    {!! Html::script('js/jquery.flot.pie.js') !!}
    
    {!! Html::script('js/jquery.flot.stack.js') !!}
    
        {!! Html::script('js/jquery.flot.resize.min.js') !!}
        
        {!! Html::script('js/jquery.chosen.min.js') !!}
        
        {!! Html::script('js/jquery.uniform.min.js') !!}
        
        {!! Html::script('js/jquery.cleditor.min.js') !!}
       
        {!! Html::script('js/jquery.noty.js') !!}
        
        {!! Html::script('js/jquery.elfinder.min.js') !!}
        
        {!! Html::script('js/jquery.raty.min.js') !!}
        
        {!! Html::script('js/jquery.iphone.toggle.js') !!}
        
        {!! Html::script('js/jquery.uploadify-3.1.min.js') !!}
        
        {!! Html::script('js/jquery.gritter.min.js') !!}
        
        {!! Html::script('js/jquery.imagesloaded.js') !!}
        
        {!! Html::script('js/jquery.masonry.min.js') !!}
        
        {!! Html::script('js/jquery.knob.modified.js') !!}
        
        {!! Html::script('js/jquery.sparkline.min.js') !!}
        
        {!! Html::script('js/counter.js') !!}
      
        {!! Html::script('js/retina.js') !!}
        
        {!! Html::script('js/custom.js') !!}
        {!! Html::script('js/province.js') !!}
        {!! Html::script('js/jquery-ui.js') !!}
        {!! Html::script('js/cargar.js') !!}
        {!! Html::script('js/time.js') !!}
        
       

    <!-- end: JavaScript-->
    
</body>
</html>
