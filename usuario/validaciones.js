  // Dando formato a la insercion del dui
  document.getElementById('dui').addEventListener('input', function(e) {
    let value = e.target.value;

    // Removiendo los caracteres que no son números o guion
    value = value.replace(/[^0-9-]/g, '');

    // Si tiene más de 8 dígitos y no tiene el guion, se lo agregamos
    if (value.length > 8 && value.indexOf('-') === -1) {
      value = value.slice(0, 8) + '-' + value.slice(8);
    }

    // Limitar a 10 caracteres
    if (value.length > 10) {
      value = value.slice(0, 10);
    }

    // Asignar el valor modificado al campo
    e.target.value = value;
  });

  // Permitir borrar el guion al eliminar los números anteriores
  document.getElementById('dui').addEventListener('keydown', function(e) {
    let value = e.target.value;

    // Si presionas "backspace" justo después del guion, elimina el guion
    if (e.key === 'Backspace' && value.length === 9 && value.indexOf('-') === 8) {
      e.target.value = value.slice(0, 8); // Elimina el guion
    }
  });

  // Limitando a numeros el campo de telefono
  document.getElementById('telefono').addEventListener('input', function(e) {
    let value = e.target.value;

    // Removiendo los caracteres que no son números o guion
    value = value.replace(/[^0-7-]/g, '');

    // Asignar el valor modificado al campo
    e.target.value = value;
  });

  // Validacion de input de salario
  function validarDatos() {
    var salario = document.getElementById("salario").value;
    if (salario <= 243) {
      alert("El salario debe ser mayor a 243.");
      return false;
    }
    return true;
  }

  // Lista desplegable de plazas
  document.getElementById('id_departamento').addEventListener('change', function() {
    var id_departamento = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'modal/fetch_plazas.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.getElementById('id_plaza').innerHTML = xhr.responseText;
      }
    };
    xhr.send('id_departamento=' + id_departamento);
  });