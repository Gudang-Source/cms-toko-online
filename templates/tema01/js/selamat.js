var d = new Date();
var h = d.getHours();
if (h < 11) { document.write('Selamat pagi,'); }
else { if (h < 15) { document.write('Selamat siang,'); }
else { if (h < 19) { document.write('Selamat sore,'); }
else { if (h <= 23) { document.write('Selamat malam,'); }
}}}