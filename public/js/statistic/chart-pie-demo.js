// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

const ubahPersen = function (jenis, dataJumlah) {
  return (jenis * 100 / dataJumlah).toFixed(2);
};

//green : #15cabc, blue : #2D8DFD,red : #FC2E7E, green_d : #15A7A0, blue_d : #2462B0, gray : #AFAFAF

let sd = $("#889b9").data('889b9');
let smp = $("#1082b").data('1082b');
let sma = $("#436c0").data('436c0');
let s1 = $("#e847a").data('e847a');
let s2 = $("#c793b").data('c793b');
let s3 = $("#457a4").data('457a4');
let tidakBersekolah = $("#20ef3").data('20ef3');

if (sd == undefined) sd = 0;
if (smp == undefined) smp = 0;
if (sma == undefined) sma = 0;
if (s1 == undefined) s1 = 0;
if (s2 == undefined) s2 = 0;
if (s3 == undefined) s3 = 0;
if (tidakBersekolah == undefined) tidakBersekolah = 0;

const semuaPend = sma + smp + sd + s1 + s2 + s3 + tidakBersekolah;


// Pendidikan
var pendidikan = document.getElementById("4038e");
var myPieChart = new Chart(pendidikan, {
  type: 'doughnut',
  data: {
    labels: ["SD", "SMP", "SMA/SMK", "S1", "S2", "S3", "Tidak Bersekolah"],
    datasets: [{
      data: [
        ubahPersen(sd, semuaPend),
        ubahPersen(smp, semuaPend),
        ubahPersen(sma, semuaPend),
        ubahPersen(s1, semuaPend),
        ubahPersen(s2, semuaPend),
        ubahPersen(s3, semuaPend),
        ubahPersen(tidakBersekolah, semuaPend),
      ],
      backgroundColor: ['#15cabc', '#2D8DFD', '#FC2E7E', '#2462B0', '#15A7A0', '#AFAFAF'],
      hoverBackgroundColor: [],
      hoverBorderColor: "rgba(0, 236, 244, 0)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#000",
      borderColor: '#dddfeb',
      borderWidth: 0,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 70,
  },
});


// Agama
let islam = $("#821c3").data('821c3');
let kristen = $("#dbcd6").data('dbcd6');
let katholik = $("#0d2cb").data('0d2cb');
let hindu = $("#276d2").data('276d2');
let buddha = $("#3fa31").data('3fa31');
let konghucu = $("#8b283").data('8b283');

if (islam == undefined) islam = 0;
if (hindu == undefined) hindu = 0;
if (konghucu == undefined) konghucu = 0;
if (katholik == undefined) katholik = 0;
if (buddha == undefined) buddha = 0;
if (kristen == undefined) kristen = 0;

const semuaAgama = islam + kristen + katholik + buddha + hindu + konghucu;


var agama = document.getElementById("6f5e0");
var myPieChart = new Chart(agama, {
  type: 'doughnut',
  data: {
    labels: ["Islam", "Kristen", "Konghucu", "Hindu", "Buddha", "Katholik"],
    datasets: [{
      data: [
        ubahPersen(islam, semuaAgama),
        ubahPersen(kristen, semuaAgama),
        ubahPersen(konghucu, semuaAgama),
        ubahPersen(hindu, semuaAgama),
        ubahPersen(buddha, semuaAgama),
        ubahPersen(katholik, semuaAgama),
      ],
      backgroundColor: ['#15cabc', '#2D8DFD', '#FC2E7E', '#2462B0', '#15A7A0', '#AFAFAF'],
      hoverBackgroundColor: [],
      hoverBorderColor: "rgba(0, 236, 244, 0)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#000",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 70,
  },
});


// Tinggal
let kos = $("#0d1b7").data('0d1b7');
let rumah = $("#35ed7").data('35ed7');
let menumpang = $("#1982a").data('1982a');
const semuaTinggal = kos + rumah + menumpang;
console.log(ubahPersen(rumah, semuaTinggal));
var tinggal = document.getElementById("7195e");
var myPieChart = new Chart(tinggal, {
  type: 'doughnut',
  data: {
    labels: ["Kos/Menyewa", "Rumah Sendiri", "Menumpang"],
    datasets: [{
      data: [ubahPersen(kos, semuaTinggal), ubahPersen(rumah, semuaTinggal), ubahPersen(menumpang, semuaTinggal)],
      backgroundColor: ['#15cabc', '#2D8DFD', '#FC2E7E'],
      hoverBackgroundColor: [],
      hoverBorderColor: "rgba(0, 236, 244, 0)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#000",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 70,
  },
});


// Profesi
let buruh = $("#bfe74").data('bfe74');
let freelancer = $("#b63ad").data('b63ad');
let wirausaha = $("#9e9aa").data('9e9aa');
let pns = $("#2eecf").data('2eecf');
let karyawan = $("#4c050").data('4c050');
let tidakBekerja = $("#187c1").data('187c1');

if (buruh == undefined) buruh = 0;
if (pns == undefined) pns = 0;
if (tidakBekerja == undefined) tidakBekerja = 0;
if (wirausaha == undefined) wirausaha = 0;
if (karyawan == undefined) karyawan = 0;
if (freelancer == undefined) freelancer = 0;

const semuaProfesi = buruh + freelancer + wirausaha + karyawan + pns + tidakBekerja;


var profesi = document.getElementById("96ff5");
var myPieChart = new Chart(profesi, {
  type: 'doughnut',
  data: {
    labels: ["Buruh", "Freelancer", "Tidak Bekerja", "PNS/TNI/POLRI", "Karyawan Swasta", "Wirausaha"],
    datasets: [{
      data: [
        ubahPersen(buruh, semuaProfesi),
        ubahPersen(freelancer, semuaProfesi),
        ubahPersen(tidakBekerja, semuaProfesi),
        ubahPersen(pns, semuaProfesi),
        ubahPersen(karyawan, semuaProfesi),
        ubahPersen(wirausaha, semuaProfesi),
      ],
      backgroundColor: ['#15cabc', '#2D8DFD', '#FC2E7E', '#2462B0', '#15A7A0', '#AFAFAF'],
      hoverBackgroundColor: [],
      hoverBorderColor: "rgba(0, 236, 244, 0)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#000",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 70,
  },
});


// Gaji
let low = $("#b40ea").data('b40ea');
let avg = $("#2d8a0").data('2d8a0');
let avgh = $("#01f5c").data('01f5c');
let high = $("#483d1").data('483d1');
let tidakSebut = $("#f0a84").data('f0a84');

if (low == undefined) low = 0;
if (high == undefined) high = 0;
if (avgh == undefined) avgh = 0;
if (tidakSebut == undefined) tidakSebut = 0;
if (avg == undefined) avg = 0;

const semuaGaji = low + avg + avgh + tidakSebut + high;


var gaji = document.getElementById("e98e3");
var myPieChart = new Chart(gaji, {
  type: 'doughnut',
  data: {
    labels: ["< Rp. 1.000.000", "Rp. 1.000.000 - Rp. 5.000.000", "Rp. 5.000.000 - Rp. 10.000.000", "> Rp. 10.000.000", "Tidak Ingin Disebutkan"],
    datasets: [{
      data: [
        ubahPersen(low, semuaGaji),
        ubahPersen(avg, semuaGaji),
        ubahPersen(avgh, semuaGaji),
        ubahPersen(high, semuaGaji),
        ubahPersen(tidakSebut, semuaGaji),
      ],
      backgroundColor: ['#15cabc', '#2D8DFD', '#FC2E7E', '#2462B0', '#15A7A0'],
      hoverBackgroundColor: [],
      hoverBorderColor: "rgba(0, 236, 244, 0)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#000",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 70,
  },
});

