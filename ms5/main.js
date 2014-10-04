function KeepMeUpdated()
{

  var name = document.getElementById("userName").value;
  var email = document.getElementById("userEmail").value;
  console.log(name + " " + email);

  var tableContainer = document.getElementById("updateMeForm");
  var para = document.createElement('h3');
  var node = document.createTextNode(name + ", we will keep you updated with news of our website's launch at your email: " + email);
  para.appendChild(node);
  tableContainer.appendChild(para); 
  
};
