/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

import './styles/slider.scss';



// start the Stimulus application
import './bootstrap';
import 'tw-elements';

// Initialization for ES Users
import {
    Dropdown,
    Ripple,
    initTE,
  } from "tw-elements";
  
  initTE({ Dropdown, Ripple });


  const checkboxOui = document.getElementById("checkbox-oui");
  const checkboxNon = document.getElementById("checkbox-non");
  const checkboxTextNon = document.getElementById("checkbox-text-non");
  const checkboxTextOui = document.getElementById("checkbox-text-oui");
  
  checkboxOui.addEventListener("change", () => {
    if (checkboxOui.checked) {
      // Code à exécuter si la checkbox "oui" est cochée
      checkboxTextOui.classList.remove("hidden");
      checkboxTextOui.classList.add("block");
      
      // Vérifie si la case "non" est cochée et masque le contenu correspondant si c'est le cas
      if (checkboxNon.checked) {
        checkboxNon.checked = false; 
        checkboxTextNon.classList.remove("block");
        checkboxTextNon.classList.add("hidden");
        checkboxTextNon.classList.remove("selected");
      }
      
      // Ajoute la classe "selected" à l'élément correspondant
      checkboxOui.classList.add("selected");
    } else {
      // Code à exécuter si la checkbox "oui" n'est pas cochée
      checkboxTextOui.classList.remove("block");
      checkboxTextOui.classList.add("hidden");
      checkboxTextOui.classList.remove("selected");
    }
  });
  
  checkboxNon.addEventListener("change", () => {
    if (checkboxNon.checked) {
      // Code à exécuter si la checkbox "non" est cochée
      checkboxTextNon.classList.remove("hidden");
      checkboxTextNon.classList.add("block");
      
      // Vérifie si la case "oui" est cochée et masque le contenu correspondant si c'est le cas
      if (checkboxOui.checked) {
        checkboxOui.checked = false; 
        checkboxTextOui.classList.remove("block");
        checkboxTextOui.classList.add("hidden");
        checkboxTextOui.classList.remove("selected");
      }
      
      // Ajoute la classe "selected" à l'élément correspondant
      checkboxNon.classList.add("selected");
    } else {
      // Code à exécuter si la checkbox "non" n'est pas cochée
      checkboxTextNon.classList.remove("block");
      checkboxTextNon.classList.add("hidden");
      checkboxTextNon.classList.remove("selected");
    }
  });

  

  



  
  

