// import { DisplayLabel } from './components/DisplayLabel';
import "../lib/slick/slick.min"
import "./slider";

let Main = {
  init: async function () {

    // initialize demo javascript component - async/await invokes some 
    //  level of babel transformation 
    const displayLabel = new DisplayLabel();
    await displayLabel.init();

  }
};


// Main.init();
