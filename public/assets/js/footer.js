function initFooter()
{
    if(document.body.clientHeight < $( window ).height())
    {
        $("footer").css("position", "absolute");
        $("footer").css("bottom", "0");
    }
}