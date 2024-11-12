/* Exportar Excel */
function exportExcel() {
    //Se recibe la cantidad de filas
    var numRows = $("#numRows").val();
    //Se abre en otra ventana el archivo para exportar con las filas enviadas
    window.open('views/export/excel/exportExcel.php?action=ajax&numRows='+numRows,'_blank');
}
/* Exportar PDF */
function exportPdf() {
    //Se recibe el campo a exportar
    var element = document.getElementById('form-print');
    //Se envía a la libreria
    html2pdf(element);
}
/* Imprimir pantalla */
function exportPrint() {
    //Se recibe la cantidad de filas
    var numRows = $("#numRows").val();
    //Se abre en otra ventana el archivo para exportar con las filas enviadas
    VentanaCentrada('views/export/print/exportPrint.php?action=ajax&numRows='+numRows,'Factura','','1024','768','true');
    //window.open('views/export/print/exportPrint.php?action=ajax&numRows='+numRows,'_blank');
}
/* Exportar Word */
function exportWord(){
    //Se recibe la cantidad de filas
    var numRows = $("#numRows").val();
    //Se abre en otra ventana el archivo para exportar con las filas enviadas
    window.open('views/export/word/exportWord.php?action=ajax&numRows='+numRows,'_blank');
 }