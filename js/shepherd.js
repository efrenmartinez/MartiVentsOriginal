const tour = new Shepherd.Tour({
  useModalOverlay: true,
  defaultStepOptions: {
    scrollTo: true
  },
});
$(document).ready(function(){
  tour.start();
  count = 0;
  contTableRow = 0;
});


var ele=[
      {
        'paso':1,
        'text':'Campo para ingresar el concepto de salesforce que se desea buscar.',
        'classes':'stepBottomArrow',
        'element':'#elementos-busqueda',
        'on':'bottom',
        'id':'stepUno'

      },
      {
        'paso':2,
        'text':'N\xfamero de registros encontrados de cada concepto de salesforce.',
        'classes':'stepRightArrow',
        'element':'.col-first-parent',
        'on':'right',
        'id':'stepDos'
      },
      {
        'paso':3,
        'text':'Se muestra la informaci\u00f3n de los registros encontrados.',
        'classes':'stepBottomArrow',
        'element':'.col-second-parent',
        'on':'bottom',
        'id':'stepTres'
      }];
      
 for(let i= 0; i<=2; i++){
  var textoBoton= i!=0 ? 'ANTERIOR':'SALIR' ;//TEXTO DINAMICO DE BOTONES DE ACUERDO AL PASO
  var textoBotonDos= i!=2 ? 'SIGUIENTE':'COMENZAR' ;//TEXTO DINAMICO DE BOTONES DE ACUERDO AL PASO

  tour.addStep(
  {
  title: 'PASO '+ele[i].paso,
  cancelIcon: {
    enabled: true

  },
  text: ele[i].text,
  classes:ele[i].classes,
  attachTo: {
    element: ele[i].element,
    on: ele[i].on
  },
  buttons: [
    {
      action() {
        i!=0 ? this.on(anterior()):this.on(cancelarTour()) ;
      },
      classes: 'shepherdBtnsSalir',
      text: textoBoton
    },
    {
      action() {
        i!=2 ? this.on(siguiente()):this.on(cancelarTour()) ;
        
      },
      classes: 'shepherdBtns',
      text: textoBotonDos
    }

  ],
  id: ele[i].id
  });
 }

siguiente = function(){
  stepNum = tour.getCurrentStep().id;
  if(stepNum == 'stepUno'){
    count++;
    if(count == 1){
        $(".btn-consultar-busqueda").trigger("click");
        $("#cont-sitio-plan").trigger("click");

        $('.shepherdBtns.shepherd-button').hide();
        $('.shepherdBtnsSalir.shepherd-button').hide();
        $('.shepherd-cancel-icon').hide();

        
    }else{
      tour.next();

    }
  }else{
      tour.next();

  }
}
anterior = function(){
disenio(1)
tour.back();
}
cancelarTour = function(){
  tour.cancel();
}

