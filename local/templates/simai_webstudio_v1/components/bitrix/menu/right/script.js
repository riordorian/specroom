function ShowSub(item,path,what)
{
	if (what.alt == "plus") 
	{
		what.alt = "minus";
		what.src = path + what.alt + ".png";
		document.getElementById(item).style.display = "block";
	} 
	else
	{
		what.alt = "plus";
		what.src = path + what.alt + ".png";
		document.getElementById(item).style.display = "none";
	}
}