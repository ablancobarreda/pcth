script

function showInp(){
  getSelectValue = document.getElementById("telprefix").value;
  if(getSelectValue=="and"){
    document.getElementById("andphone").style.display = "inline-block";
    document.getElementById("espphone").style.display = "none";
    document.getElementById("frphone").style.display = "none";
  }else if(getSelectValue=="esp"){
    document.getElementById("andphone").style.display = "none";
    document.getElementById("espphone").style.display = "inline-block";
    document.getElementById("frphone").style.display = "none";
  }else if(getSelectValue=="fr"){
    document.getElementById("andphone").style.display = "none";
    document.getElementById("espphone").style.display = "none";
    document.getElementById("frphone").style.display = "inline-block";
  }
}



html
<select name="telprefix" id="telprefix" onchange="showInp()">
    <option value="">--Prefix</option>
    <option value="and">+376</option>
    <option value="esp">+34</option>
    <option value="fr">+33</option> 
</select>

<input id="andphone" type="tel" pattern="[3]{9}-[3]{9}" style="display: none" placeholder="and"/>
<input id="espphone" type="tel" pattern="[3]{9}-[3]{9}-[3]{9}" style="display: none" placeholder="esp"/>
<input id="frphone" type="tel"  pattern="[1]{9}[3]{9}-[3]{9}-[3]{9}" style="display: none" placeholder="fr"/>
