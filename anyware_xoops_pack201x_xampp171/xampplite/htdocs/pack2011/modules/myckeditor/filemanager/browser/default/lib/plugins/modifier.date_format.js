function jsmarty_modifier_date_format(Z,C,o){var k=JSmarty.Plugin.get("php.strftime");if(C==void (0)){C="%b %e %Y";}if(o==void (0)){o=null;}if(Z!=""){return k(C,new Date(Z).getTime());}if(!o){return k(C,new Date(Z).getTime());}return "";}