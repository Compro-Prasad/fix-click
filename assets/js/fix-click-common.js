function toggle_hide_div(div_name)
{
	$(div_name).css('display',$(div_name).css('display')=='none'?'block':'none')
}

function hide(div_name)
{
	$(div_name).css('display', 'none')
}

function show(div_name)
{
	$(div_name).css('display', 'block')
}
