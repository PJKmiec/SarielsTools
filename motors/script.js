$(document).ready(function() {

  function number_format(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
  }

  let maxes = {
    "torque": 17.3,
    "speed": 2000,
    "mechanical_power": 4.61,
    "size": 672,
    "weight": 269,
    "efficiency": 56,
    "noise_level": 80,
  };

  let motors = [
    {
      "name": "EV3 L",
      "image": "mev3l",
      "bl_id": 95658,
      "type": "Mindstorms",
      "torque": 17.3,
      "p9v": {
        "speed": 105,
        "mechanical_power": 1.9,
        "efficiency": 31
      },
      "p7v": {
        "speed": 78,
        "mechanical_power": 1.41,
        "efficiency": 27
      },
      "dimensions": "5x7x13.5",
      "volume": 472.5,
      "weight": 82,
      "noise_level": 40,
      "noload_current": 60,
      "stalled_current": 1800,
      "input": "EV3 Mindstorms-type socket",
      "output": "two-sided 3x3 round brick with 3-studs-deep axle hole going through it and 4 pin holes around it on either side",
      "start": 2013,
      "end": 2016,
      "sets": 3,
      "speeds_labels": ["Eneloop batteries", "Ni-Zn batteries", "Mindstorms rechargeable battery"],
      "speeds": {
        "No load": [78, 105, 153],
        "10g load": [11, 12, 13],
        "50g load": [11, 12, 13],
        "100g load": [21, 22, 23],
        "250g load": [31, 32, 33],
        "500g load": [41, 42, 43]
      }
    },
    {
      "name": "NXT",
      "image": "mnxt",
      "bl_id": 53787,
      "type": "Mindstorms",
      "torque": 16.7,
      "p9v": {
        "speed": 117,
        "mechanical_power": 2.03,
        "efficiency": 41
      },
      "p7v": {
        "speed": 82,
        "mechanical_power": 1.44,
        "efficiency": 37
      },
      "dimensions": "5x7x13.5",
      "volume": 472.5,
      "weight": 80,
      "noise_level": 30,
      "noload_current": 60,
      "stalled_current": 2000,
      "input": "Mindstorms-type socket",
      "output": "two-sided 3x3 round brick with 3-studs-deep axle hole going through it and 4 pin holes around it on either side",
      "start": 2006,
      "end": 2014,
      "sets": 4,
      "speeds_labels": ["Eneloop batteries", "Ni-Zn batteries", "Mindstorms rechargeable battery"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [50, 115, 120, 155, 122, 134],
        "50g load": [50, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "PF XL",
      "image": "mpfxl",
      "bl_id": "58121c01",
      "type": "Power Functions",
      "torque": 14.5,
      "p9v": {
        "speed": 146,
        "mechanical_power": 2.21,
        "efficiency": 45
      },
      "p7v": {
        "speed": 100,
        "mechanical_power": 1.51,
        "efficiency": 40
      },
      "dimensions": "5x5x6",
      "volume": 150,
      "weight": 69,
      "noise_level": 7,
      "noload_current": 80,
      "stalled_current": 1800,
      "input": "permanently attached 20 cm long wire with Power Functions plug",
      "output": "1-stud-deep axle hole",
      "start": 2007,
      "end": 2017,
      "sets": 7,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [164, 256, 210, 258, 161, 191],
        "10g load": [161, 205, 175, 224, 157, 178],
        "50g load": [142, 201, 172, 215, 141, 163],
        "100g load": [139, 189, 160, 184, 104, 157],
        "250g load": [46, 52, 103, 144, 70, 90],
        "500g load": [0, 0, 15, 65, 0, 0]
      }
    },
    {
      "name": "Powered Up L",
      "image": "mcplusl",
      "bl_id": "bb0959c01",
      "type": "Powered Up",
      "torque": 8.81,
      "p9v": {
        "speed": 198,
        "mechanical_power": 1.83,
        "efficiency": 39
      },
      "p7v": {
        "speed": 141,
        "mechanical_power": 1.3,
        "efficiency": 34
      },
      "dimensions": "3x4x8",
      "volume": 96,
      "weight": 53,
      "noise_level": 30,
      "noload_current": 120,
      "stalled_current": 1400,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "1-stud-deep axle hole",
      "start": 2019,
      "end": 2023,
      "sets": 11,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [40, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Powered Up XL",
      "image": "mcplusxl",
      "bl_id": "bb0960c01",
      "type": "Powered Up",
      "torque": 8.81,
      "p9v": {
        "speed": 198,
        "mechanical_power": 1.83,
        "efficiency": 44
      },
      "p7v": {
        "speed": 147,
        "mechanical_power": 1.36,
        "efficiency": 39
      },
      "dimensions": "5x5x8",
      "volume": 200,
      "weight": 76,
      "noise_level": 30,
      "noload_current": 60,
      "stalled_current": 1100,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "1-stud-deep axle hole",
      "start": 2019,
      "end": 2020,
      "sets": 5,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Powered Up XXL",
      "image": "mcplusservo",
      "bl_id": "54675c02",
      "type": "Powered Up",
      "torque": 8.47,
      "p9v": {
        "speed": 156,
        "mechanical_power": 1.38,
        "efficiency": 35
      },
      "p7v": {
        "speed": 126,
        "mechanical_power": 1.12,
        "efficiency": 34
      },
      "dimensions": "5x4x10",
      "volume": 200,
      "weight": 71,
      "noise_level": 30,
      "noload_current": 110,
      "stalled_current": 1800,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "one-sided 3x3 round brick with 1-stud-deep axle hole and 4 pin holes around it",
      "start": 2020,
      "end": 2023,
      "sets": 4,
      "note": "virtually identical to the Spike L motor except for the color",
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Spike L",
      "image": "mspikel",
      "bl_id": "54675c01",
      "type": "Spike",
      "torque": 8.47,
      "p9v": {
        "speed": 156,
        "mechanical_power": 1.38,
        "efficiency": 35
      },
      "p7v": {
        "speed": 126,
        "mechanical_power": 1.12,
        "efficiency": 34
      },
      "dimensions": "5x4x10",
      "volume": 200,
      "weight": 71,
      "noise_level": 30,
      "noload_current": 110,
      "stalled_current": 1800,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "one-sided 3x3 round brick with 1-stud-deep axle hole and 4 pin holes around it",
      "start": 2020,
      "end": 2021,
      "sets": 4,
      "note": "virtually identical to the Powered Up XXL motor except for the color",
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "EV3 M",
      "image": "mev3m",
      "bl_id": "99455",
      "type": "Mindstorms",
      "torque": 6.64,
      "p9v": {
        "speed": 165,
        "mechanical_power": 1.15,
        "efficiency": 34
      },
      "p7v": {
        "speed": 120,
        "mechanical_power": 0.83,
        "efficiency": 32
      },
      "dimensions": "3x4x9",
      "volume": 108,
      "weight": 39,
      "noise_level": 30,
      "noload_current": 80,
      "stalled_current": 780,
      "input": "EV3 Mindstorms-type socket",
      "output": "1-stud-deep axle hole",
      "start": 2013,
      "end": 2016,
      "sets": 3,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "PF L",
      "image": "mpfl",
      "bl_id": "99499c01",
      "type": "Power Functions",
      "torque": 6.48,
      "p9v": {
        "speed": 272,
        "mechanical_power": 1.85,
        "efficiency": 42
      },
      "p7v": {
        "speed": 203,
        "mechanical_power": 1.38,
        "efficiency": 38
      },
      "dimensions": "3x4x7",
      "volume": 84,
      "weight": 42,
      "noise_level": 30,
      "noload_current": 120,
      "stalled_current": 1300,
      "input": "permanently attached 20 cm long wire with Power Functions plug",
      "output": "1-stud-deep axle hole",
      "start": 2012,
      "end": 2019,
      "sets": 10,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "RC Buggy",
      "image": "mrc",
      "bl_id": "5292c01",
      "type": "9V",
      "torque": 5.7,
      "p9v": {
        "speed": 1055,
        "mechanical_power": 4.61,
        "efficiency": 37
      },
      "p7v": {
        "speed": 780,
        "mechanical_power": 3.45,
        "efficiency": 34
      },
      "dimensions": "5x5.5x11",
      "volume": 302.5,
      "weight": 55,
      "noise_level": 68,
      "noload_current": 160,
      "stalled_current": 3200,
      "input": "2x2 studs contact area on top of the motor",
      "output": "two open axle holes, 2-studs thick each",
      "start": 2002,
      "end": 2006,
      "sets": 5,
      "note": "this motor has two outputs, spinning in opposite directions and geared internally 17(inner):23(outer), meaning that the inner output is roughly 26% faster and weaker than the outer one. All performance here is measured for the outer output.",
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Spike M",
      "image": "mspikem",
      "bl_id": "54696c01",
      "type": "Spike",
      "torque": 4.48,
      "p9v": {
        "speed": 138,
        "mechanical_power": 0.65,
        "efficiency": 24
      },
      "p7v": {
        "speed": 105,
        "mechanical_power": 0.49,
        "efficiency": 24
      },
      "dimensions": "3x4x10",
      "volume": 120,
      "weight": 49,
      "noise_level": 30,
      "noload_current": 100,
      "stalled_current": 850,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "one-sided 3x3 round brick with 1-stud-deep axle hole and 4 pin holes around it",
      "start": 2020,
      "end": 2021,
      "sets": 4,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Boost XL",
      "image": "mboost",
      "bl_id": "bb0893c01",
      "type": "Boost",
      "torque": 4.08,
      "p9v": {
        "speed": 171,
        "mechanical_power": 0.73,
        "efficiency": 42
      },
      "p7v": {
        "speed": 126,
        "mechanical_power": 0.54,
        "efficiency": 38
      },
      "dimensions": "3x4x6",
      "volume": 72,
      "weight": 43,
      "noise_level": 30,
      "noload_current": 41,
      "stalled_current": 450,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "1-stud-deep axle hole",
      "start": 2017,
      "end": 2019,
      "sets": 3,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Boost M",
      "image": "mpum",
      "bl_id": "21980",
      "type": "Boost",
      "torque": 4.08,
      "p9v": {
        "speed": 270,
        "mechanical_power": 1.15,
        "efficiency": 43
      },
      "p7v": {
        "speed": 201,
        "mechanical_power": 0.7,
        "efficiency": 39
      },
      "dimensions": "3x3x6",
      "volume": 54,
      "weight": 34,
      "noise_level": 30,
      "noload_current": 60,
      "stalled_current": 800,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "1-stud-deep axle hole",
      "start": 2016,
      "end": 2022,
      "sets": 6,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "PF M",
      "image": "mpfm",
      "bl_id": "58120c01",
      "type": "Power Functions",
      "torque": 3.63,
      "p9v": {
        "speed": 275,
        "mechanical_power": 1.04,
        "efficiency": 37
      },
      "p7v": {
        "speed": 185,
        "mechanical_power": 0.7,
        "efficiency": 34
      },
      "dimensions": "3x3x6",
      "volume": 54,
      "weight": 31,
      "noise_level": 13,
      "noload_current": 65,
      "stalled_current": 850,
      "input": "permanently attached 20 cm long wire with Power Functions plug",
      "output": "1-stud-deep axle hole",
      "start": 2007,
      "end": 2018,
      "sets": 29,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [256, 414, 358, 463, 355, 344],
        "10g load": [219, 251, 228, 253, 178, 157],
        "50g load": [166, 339, 250, 413, 76, 49],
        "100g load": [0, 0, 0, 0, 0, 0],
        "250g load": [0, 0, 0, 0, 0, 0],
        "500g load": [0, 0, 0, 0, 0, 0]
      }
    },
    {
      "name": "43362",
      "image": "m71427",
      "bl_id": "43362c01",
      "type": "9V",
      "torque": 2.25,
      "p9v": {
        "speed": 219,
        "mechanical_power": 0.51,
        "efficiency": 47
      },
      "p7v": {
        "speed": 140,
        "mechanical_power": 0.33,
        "efficiency": 39
      },
      "dimensions": "4x4x4",
      "volume": 64,
      "weight": 28,
      "noise_level": 30,
      "noload_current": 9,
      "stalled_current": 340,
      "input": "2x2 studs contact area on top of the motor",
      "output": "1L axle",
      "start": 1993,
      "end": 2004,
      "sets": 14,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "47154",
      "image": "m47154",
      "bl_id": "47154c02",
      "type": "9V",
      "torque": 2.25,
      "p9v": {
        "speed": 315,
        "mechanical_power": 0.74,
        "efficiency": 43
      },
      "p7v": {
        "speed": 210,
        "mechanical_power": 0.49,
        "efficiency": 37
      },
      "dimensions": "4x4x4",
      "volume": 64,
      "weight": 40,
      "noise_level": 50,
      "noload_current": 31,
      "stalled_current": 580,
      "input": "2x2 studs contact area on top of the motor",
      "output": "1-stud-deep axle hole",
      "start": 2003,
      "end": 2006,
      "sets": 2,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "71427",
      "image": "m71427",
      "bl_id": "71427c01",
      "type": "9V",
      "torque": 2.25,
      "p9v": {
        "speed": 250,
        "mechanical_power": 0.58,
        "efficiency": 56
      },
      "p7v": {
        "speed": 160,
        "mechanical_power": 0.38,
        "efficiency": 45
      },
      "dimensions": "4x4x4",
      "volume": 64,
      "weight": 42,
      "noise_level": 37,
      "noload_current": 3.5,
      "stalled_current": 360,
      "input": "2x2 studs contact area on top of the motor",
      "output": "1L axle",
      "start": 1997,
      "end": 2004,
      "sets": 27,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "PF E",
      "image": "mpfe",
      "bl_id": "87577c01",
      "type": "Power Functions",
      "hide_charts": true,
      "torque": 1.32,
      "p9v": {
        "speed": 420,
        "mechanical_power": 0.58,
        "efficiency": 36
      },
      "p7v": {
        "speed": 300,
        "mechanical_power": 0.42,
        "efficiency": 33
      },
      "dimensions": "3x4x6",
      "volume": 72,
      "weight": 50,
      "noise_level": 30,
      "noload_current": 17.5,
      "stalled_current": 410,
      "input": "permanently attached 20 cm long wire with Power Functions plug",
      "output": "1-stud-deep axle hole",
      "start": 2010,
      "end": 2014,
      "sets": 2,
      "note": "a motor designed to act as a power generator in a LEGO Education set, poor performance when used to drive anything",
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Micromotor",
      "image": "mmicromotorcomplete",
      "bl_id": "2986",
      "type": "9V",
      "torque": 1.28,
      "p9v": {
        "speed": 16,
        "mechanical_power": 0.021,
        "efficiency": 16
      },
      "p7v": {
        "speed": "?",
        "mechanical_power": "?",
        "efficiency": "?"
      },
      "dimensions": "2x2x3",
      "volume": 12,
      "weight": 10,
      "noise_level": 30,
      "noload_current": 6,
      "stalled_current": 80,
      "input": "2x2 contact area on the back (the wall opposing the output)",
      "output": "special connector with a 1-stud-deep axle hole and a pulley on it",
      "start": 1993,
      "end": 2001,
      "sets": 10,
      "note": "easily damaged from stalling if used without the pulley which acts as a safety clutch",
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "9V Train Bogie",
      "image": "m9vtrain",
      "bl_id": "590",
      "type": "Trains",
      "hide_charts": true,
      "torque": 0.9,
      "p9v": {
        "speed": 1250,
        "mechanical_power": 1.11,
        "efficiency": 33
      },
      "p7v": {
        "speed": 1071,
        "mechanical_power": 0.99,
        "efficiency": 35
      },
      "dimensions": "3x4x11",
      "volume": 132,
      "weight": 72,
      "noise_level": 30,
      "noload_current": 90,
      "stalled_current": 950,
      "input": "2x2 studs contact area on top of front of the bogie",
      "output": "two open axle holes, 4 studs thick each",
      "start": 1991,
      "end": 2007,
      "sets": 18,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "PU Train Bogie",
      "image": "mpftrain",
      "bl_id": "bb0896c01",
      "type": "Trains",
      "hide_charts": true,
      "torque": 0.9,
      "p9v": {
        "speed": 1242,
        "mechanical_power": 1.15,
        "efficiency": 31
      },
      "p7v": {
        "speed": 855,
        "mechanical_power": 0.79,
        "efficiency": 26
      },
      "dimensions": "3x4x11",
      "volume": 132,
      "weight": 57,
      "noise_level": 30,
      "noload_current": 100,
      "stalled_current": 1100,
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "two open axle holes, 4 studs thick each",
      "start": 2018,
      "end": 2022,
      "sets": 6,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "PF Train Bogie",
      "image": "mpftrain",
      "bl_id": "87574c01",
      "type": "Trains",
      "hide_charts": true,
      "torque": 0.85,
      "p9v": {
        "speed": 1458,
        "mechanical_power": 1.3,
        "efficiency": 38
      },
      "p7v": {
        "speed": 1107,
        "mechanical_power": 0.99,
        "efficiency": 35
      },
      "dimensions": "3x4x11",
      "volume": 132,
      "weight": 57,
      "noise_level": 30,
      "noload_current": 90,
      "stalled_current": 1300,
      "input": "permanently attached 20 cm long wire with Power Functions plug",
      "output": "two open axle holes, 4 studs thick each",
      "start": 2010,
      "end": 2015,
      "sets": 7,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "RC Train Bogie",
      "image": "m9vtrain",
      "bl_id": "x1688",
      "type": "Trains",
      "hide_charts": true,
      "torque": 0.85,
      "p9v": {
        "speed": 990,
        "mechanical_power": 0.88,
        "efficiency": 22
      },
      "p7v": {
        "speed": 549,
        "mechanical_power": 0.49,
        "efficiency": 15
      },
      "dimensions": "3x4x11",
      "volume": 132,
      "weight": 53,
      "noise_level": 30,
      "noload_current": 90,
      "stalled_current": 750,
      "input": "2x2 studs contact area on top of front of the bogie",
      "output": "two open axle holes, 4 studs thick each",
      "start": 2006,
      "end": 2009,
      "sets": 3,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "2838",
      "image": "m2838",
      "bl_id": "2838",
      "type": "9V",
      "torque": 0.45,
      "p9v": {
        "speed": 2000,
        "mechanical_power": 0.9,
        "efficiency": 31
      },
      "p7v": {
        "speed": 1000,
        "mechanical_power": 0.46,
        "efficiency": 20
      },
      "dimensions": "3x4x5",
      "volume": 60,
      "weight": 48,
      "noise_level": 10,
      "noload_current": 35,
      "stalled_current": 700,
      "input": "2x5 studs contact area on the bottom of the motor",
      "output": "1L axle",
      "start": 1990,
      "end": 2002,
      "sets": 17,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "PF Servo",
      "image": "mpfservo",
      "bl_id": "99498c01",
      "type": "Power Functions",
      "hide_charts": true,
      "torque": "?",
      "p9v": {
        "speed": "?",
        "mechanical_power": "?",
        "efficiency": "?"
      },
      "p7v": {
        "speed": "?",
        "mechanical_power": "?",
        "efficiency": "?"
      },
      "dimensions": "3x5x7",
      "volume": 105,
      "weight": 44,
      "noise_level": 30,
      "noload_current": "?",
      "stalled_current": "?",
      "input": "permanently attached 20 cm long wire with Power Functions plug",
      "output": "two 1-stud-deep axle holes; one in the front, one in the back, turning in the same direction, one stud apart internally",
      "start": 2012,
      "end": 2014,
      "sets": 4,
      "note": "mechanically limited to only rotate 90&deg; left or right from the central position, depending on the voltage provided; no continuous 360&deg; rotation",
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Spike S",
      "image": "mspikes",
      "bl_id": "68488c01",
      "type": "Spike",
      "torque": "?",
      "p9v": {
        "speed": "?",
        "mechanical_power": "?",
        "efficiency": "?"
      },
      "p7v": {
        "speed": "?",
        "mechanical_power": "?",
        "efficiency": "?"
      },
      "dimensions": "3x4x5",
      "volume": 60,
      "weight": 23,
      "noise_level": 30,
      "noload_current": "?",
      "stalled_current": "?",
      "input": "permanently attached 25 cm long wire with Powered Up plug",
      "output": "one-sided 3x3 round brick with 1-stud-deep axle hole and 4 pin holes around it",
      "start": 2021,
      "end": 2021,
      "sets": 2,
      "speeds_labels": ["7.4V", "9V", "Eneloop", "Ni-Zn AA", "CaDa brick", "Mould King brick"],
      "speeds": {
        "No load": [100, 115, 120, 155, 122, 134],
        "10g load": [100, 115, 120, 155, 122, 134],
        "50g load": [100, 115, 120, 155, 122, 134],
        "100g load": [100, 115, 120, 155, 122, 134],
        "250g load": [100, 115, 120, 155, 122, 134],
        "500g load": [100, 115, 120, 155, 122, 134]
      }
    },
    {
      "name": "Powered Up 3-motors Hub",
      "image": "103479c01",
      "bl_id": "103479c01",
      "type": "Powered Up",
      "torque": "?",
      "p9v": {
        "speed": "?",
        "mechanical_power": "?",
        "efficiency": "?"
      },
      "p7v": {
        "speed": "?",
        "mechanical_power": "?",
        "efficiency": "?"
      },
      "dimensions": "16x7x6",
      "volume": 672,
      "weight": 269,
      "noise_level": 16,
      "noload_current": "?",
      "stalled_current": "?",
      "input": "proprietary connector for rechargeable Powered Up battery #109481c01",
      "output": "5 1-stud-deep axle holes, one in front, two in the back (coupled two per motor)",
      "start": 2024,
      "end": 2024,
      "sets": 1,
      "note": "a self-contained hub with three internal motors, one with a single output in the front and two with double outputs (set at right angles to each other) at the back. Also includes 6 LEDs that connect to LEGO fiber optics cables.",
      "speeds_labels": ["Rechargeable Powered Up battery"],
      "speeds": {
        "No load": [476],
        "10g load": [443],
        "50g load": [384],
        "100g load": [374],
        "250g load": [0],
        "500g load": [0]
      }
    },
  ];

  // initial draw
  motors = motors.sort((m1, m2) => (m1.torque < m2.torque) ? 1 : (m1.torque > m2.torque) ? -1 : 0);
  drawList(motors);

  $('input[type="checkbox"]').change(function() {
    let id = $(this).attr("id");

    if (id != "filterAll") {
      $("#filterAll").prop('checked', false);
    } else {
      $('input[type="checkbox"]').prop('checked', false);
      $(this).prop('checked', true);
    }

    sortMotors();
    drawList(filterMotors());
  });

    $('#sortSelect').change(function() {
      sortMotors();
      drawList(filterMotors());
    });

  function sortMotors() {
    var sortBy = $('#sortSelect').find(":selected").val();

    switch(sortBy) {
      case "torque_d":
        motors = motors.sort((m1, m2) => (m1.torque < m2.torque) ? 1 : (m1.torque > m2.torque) ? -1 : 0);
        break;
      case "speed_d":
        motors = motors.sort((m1, m2) => (m1.p9v.speed < m2.p9v.speed) ? 1 : (m1.p9v.speed > m2.p9v.speed) ? -1 : 0);
        break;
      case "mechanical_power_d":
        motors = motors.sort((m1, m2) => (m1.p9v.mechanical_power < m2.p9v.mechanical_power) ? 1 : (m1.p9v.mechanical_power > m2.p9v.mechanical_power) ? -1 : 0);
        break;
      case "efficiency_d":
        motors = motors.sort((m1, m2) => (m1.p9v.efficiency < m2.p9v.efficiency) ? 1 : (m1.p9v.efficiency > m2.p9v.efficiency) ? -1 : 0);
        break;
      case "volume_d":
        motors = motors.sort((m1, m2) => (m1.volume < m2.volume) ? 1 : (m1.volume > m2.volume) ? -1 : 0);
        break;
      case "weight_d":
        motors = motors.sort((m1, m2) => (m1.weight < m2.weight) ? 1 : (m1.weight > m2.weight) ? -1 : 0);
        break;
      case "noise_d":
        motors = motors.sort((m1, m2) => (m1.noise_level < m2.noise_level) ? 1 : (m1.noise_level > m2.noise_level) ? -1 : 0);
        break;
      case "start_d":
        motors = motors.sort((m1, m2) => (m1.start < m2.start) ? 1 : (m1.start > m2.start) ? -1 : 0);
        break;
      case "sets_d":
        motors = motors.sort((m1, m2) => (m1.sets < m2.sets) ? 1 : (m1.sets > m2.sets) ? -1 : 0);
        break;

        case "torque_a":
          motors = motors.sort((m1, m2) => (m1.torque > m2.torque) ? 1 : (m1.torque < m2.torque) ? -1 : 0);
          break;
        case "speed_a":
          motors = motors.sort((m1, m2) => (m1.p9v.speed > m2.p9v.speed) ? 1 : (m1.p9v.speed < m2.p9v.speed) ? -1 : 0);
          break;
        case "mechanical_power_a":
          motors = motors.sort((m1, m2) => (m1.p9v.mechanical_power > m2.p9v.mechanical_power) ? 1 : (m1.p9v.mechanical_power < m2.p9v.mechanical_power) ? -1 : 0);
          break;
        case "efficiency_a":
          motors = motors.sort((m1, m2) => (m1.p9v.efficiency > m2.p9v.efficiency) ? 1 : (m1.p9v.efficiency < m2.p9v.efficiency) ? -1 : 0);
          break;
        case "volume_a":
          motors = motors.sort((m1, m2) => (m1.volume > m2.volume) ? 1 : (m1.volume < m2.volume) ? -1 : 0);
          break;
        case "weight_a":
          motors = motors.sort((m1, m2) => (m1.weight > m2.weight) ? 1 : (m1.weight < m2.weight) ? -1 : 0);
          break;
        case "noise_a":
          motors = motors.sort((m1, m2) => (m1.noise_level > m2.noise_level) ? 1 : (m1.noise_level < m2.noise_level) ? -1 : 0);
          break;
        case "start_a":
          motors = motors.sort((m1, m2) => (m1.start > m2.start) ? 1 : (m1.start < m2.start) ? -1 : 0);
          break;
        case "sets_a":
          motors = motors.sort((m1, m2) => (m1.sets > m2.sets) ? 1 : (m1.sets < m2.sets) ? -1 : 0);
          break;
    }
  }

  function filterMotors() {
    var filteredMotors = motors;

    if (!$("#filterAll").is(':checked')) {
      var motorTypes = new Array();

      if ($("#filterPU").is(':checked')) {
        motorTypes.push("Powered Up");
      }

      if ($("#filterPF").is(':checked')) {
        motorTypes.push("Power Functions");
      }

      if ($("#filter9V").is(':checked')) {
        motorTypes.push("9V");
      }

      if ($("#filterMNS").is(':checked')) {
        motorTypes.push("Mindstorms");
      }

      if ($("#filterSpike").is(':checked')) {
        motorTypes.push("Spike");
      }

      if ($("#filterBoost").is(':checked')) {
        motorTypes.push("Boost");
      }

      if ($("#filterTrains").is(':checked')) {
        motorTypes.push("Trains");
      }

      filteredMotors = filteredMotors.filter(motor => { return motorTypes.includes(motor.type); })
    }

    return filteredMotors;
  }

  $('body').on('click', '.dataToggler', function() {
    let id = $(this).attr("id").split('-')[1];
    $('#data-' + id).toggleClass("d-none");

    if ($(this).text() == 'keyboard_double_arrow_downSHOW STATS') {
      $(this).html('<i class="material-icons mr-1">keyboard_double_arrow_up</i>HIDE STATS');
    } else {
      $(this).html('<i class="material-icons mr-1">keyboard_double_arrow_down</i>SHOW STATS');
    }
  });

  function drawList(motors) {
    $("tbody").html("");
    motors.forEach(drawRow);
  }

  function drawRow(motor, index, array) {
    var systemBadge = "info";

    switch(motor.type) {
      case "Mindstorms":
        systemBadge = "secondary";
        break;
      case "Powered Up":
        systemBadge = "warning";
        break;
      case "Power Functions":
        systemBadge = "success";
        break;
      case "9V":
        systemBadge = "danger";
        break;
      case "Trains":
        systemBadge = "dark";
        break;
    }

    let canvasHeight = 60;

    if (motor.speeds_labels.length == 1) {
      canvasHeight = 20;
    }

    let radarValues = '[' +
      Math.round(motor.torque / maxes.torque * 100) + ', ' +
      Math.round(motor.p9v.speed / maxes.speed * 100) + ', ' +
      Math.round(motor.p9v.mechanical_power / maxes.mechanical_power * 100) + ', ' +
      Math.round(motor.volume / maxes.size * 100) + ', ' +
      Math.round(motor.weight / maxes.weight * 100) + ', ' +
      Math.round(motor.p9v.efficiency / maxes.efficiency * 100) + ', ' +
      Math.round(motor.noise_level / maxes.noise_level * 100) +
      ']';

    let note = (motor.note == null) ? `` : `<span class="text-muted"><i class="material-icons mr-2">info</i>Note:</span> ` + motor.note + `<br>`;

    let tr = `<tr>
                                        <td><img src="img/` + motor.image + `.png" width="80" height="80"></td>
                                        <td class="align-middle font-weight-bold">` + motor.name + `</td>
                                        <td class="align-middle"><span class="badge badge-pill badge-` + systemBadge + ` w-100">` + motor.type + `</span></td>
                                        <td class="align-middle">` + motor.torque + ` N.cm</td>
                                        <td class="align-middle">` + motor.p9v.speed + ` RPM</td>
                                        <td class="align-middle">` + motor.p9v.mechanical_power + ` W</td>
                                        <td class="align-middle">` + motor.p9v.efficiency + `%</td>
                                        <td class="align-middle">` + motor.start + `-` + motor.end + ` (` + motor.sets + ` sets)</td>
                                        <td class="align-middle"><button type="button" class="btn btn-primary w-100 dataToggler" id="toggle-` + motor.bl_id + `"><i class="material-icons mr-1">keyboard_double_arrow_down</i>SHOW STATS</button></td>
                                      </tr>
                                      <tr class="d-none" id="data-` + motor.bl_id + `">
                                        <td colspan="9" class="py-4" style="background: transparent url('img/` + motor.image + `.png') no-repeat 98% 0%">

                                          <div class="row">
                                            <div class="col-5">
                                              <span class="text-muted"><i class="material-icons mr-2">bookmark</i>Bricklink ID:</span> ` + motor.bl_id + `<br>
                                              <span class="text-muted"><i class="material-icons mr-2">aspect_ratio</i>Dimensions:</span> ` + motor.dimensions + ` studs<br>
                                              <span class="text-muted"><i class="material-icons mr-2">scale</i>Weight:</span> ` + motor.weight + `g<br>
                                              <span class="text-muted"><i class="material-icons mr-2">volume_up</i>Noise level:</span> ` + motor.noise_level + ` dB<br>
                                              <span class="text-muted"><i class="material-icons mr-2">electric_bolt</i>No-load current:</span> ` + motor.noload_current + ` mA<br>
                                              <span class="text-muted"><i class="material-icons mr-2">electric_bolt</i>Stalled current:</span> ` + motor.stalled_current + ` mA<br>
                                              <span class="text-muted"><i class="material-icons mr-2">input</i>Input:</span> ` + motor.input + `<br>
                                              <span class="text-muted"><i class="material-icons mr-2">output</i>Output:</span> ` + motor.output + `<br>
                                              ` + note + `<br>

                                              <a href="https://www.bricklink.com/v2/catalog/catalogitem.page?P=` + motor.bl_id + `" class="btn btn-info mr-2">SEE ON BRICKLINK</a>
                                              <a href="https://rebrickable.com/parts/` + motor.bl_id + `" class="btn btn-info">SEE ON REBRICKABLE</a>
                                            </div>
                                            <div class="col-2">
                                              9V performance:<br><br><span class="text-muted">
                                              Speed: ` + motor.p9v.speed + ` RPM<br>
                                              Mechanical power: ` + motor.p9v.mechanical_power + ` W<br>
                                              Efficiency: ` + motor.p9v.efficiency + ` %
                                              </span>
                                            </div>
                                            <div class="col-2">
                                              7V performance:<br><br><span class="text-muted">
                                              Speed: ` + motor.p7v.speed + ` RPM<br>
                                              Mechanical power: ` + motor.p7v.mechanical_power + ` W<br>
                                              Efficiency: ` + motor.p7v.efficiency + ` %
                                              </span>
                                            </div>
                                            <div class="col-3"></div>
                                          </div>

                                          <div class="row mt-4">
                                            <div class="col-8">
                                              <div class="chart-area" style="height: ` + canvasHeight + `rem;">
                                                <canvas id="speeds-1-` + motor.bl_id + `"></canvas>
                                              </div>
                                            </div>
                                            <div class="col-4">

                                            <canvas id="polar-` + motor.bl_id + `" class="my-4" width="400" height="400"></canvas>
                                               <script>
                                                  var chrt = document.getElementById("polar-` + motor.bl_id + `").getContext("2d");
                                                  var chartId = new Chart(chrt, {
                                                     type: 'polarArea',
                                                     data: {
                                                        labels: ["Torque", "Speed", "Mech. power", "Size", "Weight", "Efficiency", "Noise level"],
                                                        datasets: [{
                                                           label: "Percentile compared to all motors",
                                                           data: ` + radarValues + `,
                                                           backgroundColor: ['rgba(196, 24, 60, 0.5)', 'rgba(255, 180, 0, 0.5)', 'rgba(23, 198, 113, 0.5)', 'rgba(0, 184, 216, 0.5)', 'rgba(0, 123, 255, 0.5)', 'rgba(102, 16, 242, 0.5)', 'rgba(214, 51, 132, 0.5)'],
                                                           hoverBackgroundColor: ['rgba(196, 24, 60, 0.9)', 'rgba(255, 180, 0, 0.9)', 'rgba(23, 198, 113, 0.9)', 'rgba(0, 184, 216, 0.9)', 'rgba(0, 123, 255, 0.9)', 'rgba(102, 16, 242, 0.9)', 'rgba(214, 51, 132, 0.9)'],
                                                           borderColor: ['#FFF', '#FFF', '#FFF', '#FFF', '#FFF', '#FFF', '#FFF'],
                                                           borderWidth: 1,
                                                        }],
                                                     },
                                                     options: {
                                                        responsive: true,
                                                        title: {
				                                                   display: true,
				                                                   text: 'Motor characteristics in percentiles of all motors'
                                                         },
                                                        legend: {
                                                          display: true,
                                                          labels: {
                                                            usePointStyle: true,
                                                          },
                                                        },
                                                        tooltips: {
                                                          enabled: true,
                                                          mode: 'single',
                                                          callbacks: {
                                                            label: function(tooltipItems, data) {
                                                              return data.labels[tooltipItems.index] + ": " + tooltipItems.yLabel + ' percentile';
                                                            }
                                                          },
                                                        },
                                                        elements: {
                                                           line: {
                                                              borderWidth: 6
                                                           }
                                                        }
                                                     },
                                                  });
                                               </script>

                                               <canvas id="line-` + motor.bl_id + `" class="mt-3" width="400" height="400"></canvas>

                                            </div>
                                          </div>

                                          </div>
                                        </td>
                                      </tr>`;

    $("tbody").append(tr);

    if (!motor.hide_charts) {
      drawChart($('#speeds-1-' + motor.bl_id), Object.keys(motor.speeds), createDatasets(motor.speeds_labels, motor.speeds));

      let lineLabels = ['None', '50g', '100g', '250g', '500g', '1000g'];
      drawLineChart($('#line-' + motor.bl_id), 'Motor speed curves', 'Load', lineLabels, createDatasetsForLineCharts(motor.speeds_labels,  motor.speeds));
    }
  }

  function createDatasets(labels, values) {
    let barColors = createShadesOfColor(Object.keys(values).length, 1);
    let datasets = [];

    for (let i = 0; i < values['No load'].length; i++) {
      let data = [];
      for (let j = 0; j < Object.values(values).length; j++) {
        data.push(Object.values(values)[j][i])
      }

      datasets.push({
          label: labels[i],
          backgroundColor: barColors[i],
          hoverBackgroundColor: barColors[i],
          borderColor: barColors[i],
          borderWidth: 1,
          maxBarThickness: 40,
          data: data
        });
    }
    return datasets;
  }

  function createDatasetsForLineCharts(labels, data) {
    let bgColors = createShadesOfColor(Object.keys(data).length, 1);
    let datasets = [];

    for (let i = 0; i < labels.length; i++) {

      let parsedData = [];
      for (let j = 0; j < Object.values(data).length; j++) {
        parsedData.push(Object.values(data)[j][i])
      }

      datasets.push({
          data : parsedData,
          label: labels[i],
          borderColor: bgColors[i],
          borderWidth: 3,
          pointBackgroundColor: bgColors[i],
          fill : false
        });
    }

    return datasets;
  }

function drawChart(canvas, labels, datasets) {
  new Chart(canvas, {
    type: 'horizontalBar',
    data: {
      labels: labels,
      datasets: datasets,
    },
    options: {
      maintainAspectRatio: false,
      title: {
         display: true,
         text: 'Motor speeds with varying loads and power supplies'
       },
      plugins: {
        deferred: {
          delay: 100
        }
      },
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 20
          },
        }],
        xAxes: [{
          type: 'linear',
          position: 'top',
          ticks: {
            beginAtZero: true,
            maxTicksLimit: 20,
            padding: 10,
            // Include a suffix in the ticks
            callback: function(value, index, values) {
              return number_format(value, 0) + " RPM";
            }
          },
        }
        ],
      },
      legend: {
        display: true
      },
      tooltips: {
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        backgroundColor: 'rgb(255,255,255)',
        bodyFontColor: '#858796',
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
        callbacks: {
          label: function(tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            return datasetLabel + ': ' + number_format(tooltipItem.xLabel, 0) + " RPM";
          }
        }
      },
    }
  });
};

function drawLineChart(canvas, title, lowerLabel, labels, datasets) {
  var chartId = new Chart(canvas, {
     type: 'line',
     data : {
          labels : labels,
          datasets : datasets,
        },
     options: {
        responsive: true,
        title: {
          display: true,
          text: title
         },
        legend: {
          display: true,
          labels: {
            usePointStyle: true,
          },
        },
        scales: {
          xAxes: [{
            ticks: {
              maxTicksLimit: 40
            },
              scaleLabel: {
                display: true,
                labelString: lowerLabel
              }
           }
          ],
          yAxes: [
            {
              ticks: {
                callback: function(label, index, labels) {
                  return label +' RPM';
                }
              },
            }
          ]
        },
        elements: {
           line: {
              borderWidth: 6
           }
        }
     },
  });
}

function drawBarChart(canvas, title, leftLabel, suffix, labels, datasets) {
  var chartId = new Chart(canvas, {
     type: 'bar',
     data : {
          labels : labels,
          datasets : datasets,
        },
     options: {
       responsive: true,
       maintainAspectRatio: false,
        title: {
          display: true,
          text: title
         },
        legend: {
          display: false,
        },
        scales: {
          xAxes: [{
            gridLines : {
                display : false
            },
            ticks: {
              maxTicksLimit: 40
            },
           }
          ],
          yAxes: [
            {
              scaleLabel: {
                display: true,
                labelString: leftLabel
              },
              ticks: {
                callback: function(label, index, labels) {
                  return label + ' ' + suffix;
                }
              },
            }
          ]
        },
        tooltips: {
          enabled: true,
          mode: 'single',
          callbacks: {
            label: function(tooltipItems, data) {
              return tooltipItems.yLabel + ' ' + suffix;
            }
          }
        },
        elements: {
           line: {
              borderWidth: 6
           }
        }
     },
  });
}

// create data for comparison charts
let motorTorques = new Map();
let motorSpeeds = new Map();
let motorMPowers = new Map();
let motorEfficiencies = new Map();
let motorSizes = new Map();
let motorWeights = new Map();
let motorNoiseLevels = new Map();
let motorYears = new Map();
let motorSets = new Map();

motors.forEach((motor, i) => {
  let productionRun = (motor.end - motor.start < 1) ? 1 : (motor.end - motor.start);

  fillMap(motor.name, motor.torque, motorTorques);
  fillMap(motor.name, motor.p9v.speed, motorSpeeds);
  fillMap(motor.name, motor.p9v.mechanical_power, motorMPowers);
  fillMap(motor.name, motor.p9v.efficiency, motorEfficiencies);
  fillMap(motor.name, motor.volume, motorSizes);
  fillMap(motor.name, motor.weight, motorWeights);
  fillMap(motor.name, motor.noise_level, motorNoiseLevels);
  fillMap(motor.name, productionRun, motorYears);
  fillMap(motor.name, motor.sets, motorSets);
});

motorTorques = sortMap(motorTorques);
drawBarChart($('#totalTorque'), 'Motors by torque', 'Torque', 'N.cm', Array.from(motorTorques.keys()), createSingleDataset('Torque', motorTorques));

motorSpeeds = sortMap(motorSpeeds);
drawBarChart($('#totalSpeed'), 'Motors by speed', 'Speed', 'RPM', Array.from(motorSpeeds.keys()), createSingleDataset('Speed', motorSpeeds));

motorMPowers = sortMap(motorMPowers);
drawBarChart($('#totalMPower'), 'Motors by mechanical power', 'Mechanical power', 'W', Array.from(motorMPowers.keys()), createSingleDataset('Mechanical power', motorMPowers));

motorEfficiencies = sortMap(motorEfficiencies);
drawBarChart($('#totalEfficiency'), 'Motors by efficiency', 'Efficiency', '%', Array.from(motorEfficiencies.keys()), createSingleDataset('Efficiency', motorEfficiencies));

motorSizes = sortMap(motorSizes);
drawBarChart($('#totalSize'), 'Motors by size (in cubic studs)', 'Size', 'cubic studs', Array.from(motorSizes.keys()), createSingleDataset('Size', motorSizes));

motorWeights = sortMap(motorWeights);
drawBarChart($('#totalWeight'), 'Motors by weight', 'Weight', 'g', Array.from(motorWeights.keys()), createSingleDataset('Weight', motorWeights));

motorNoiseLevels = sortMap(motorNoiseLevels);
drawBarChart($('#totalNoiseLevel'), 'Motors by noise level', 'Noise level', 'dB', Array.from(motorNoiseLevels.keys()), createSingleDataset('Noise level', motorNoiseLevels));

motorYears = sortMap(motorYears);
drawBarChart($('#totalYears'), 'Motors by length of production run', 'Years', 'years', Array.from(motorYears.keys()), createSingleDataset('Years', motorYears));

motorSets = sortMap(motorSets);
drawBarChart($('#totalSets'), 'Motors by number of sets including them', 'Sets', '', Array.from(motorSets.keys()), createSingleDataset('Sets', motorSets));

// ---------- HELPER METHODS ----------

function fillMap(name, value, map) {
  if (value != "?") {
    map.set(name, value);
  }
}

function sortMap(map) {
  return new Map([...map.entries()].sort((a, b) => b[1] - a[1]));
}

function createShadesOfColor(size, opacity) {
  let core = [0, 184, 216];
  let maxVariation = [212, 65, 39];
  let start = [(core[0] + maxVariation[0]), (core[1] + maxVariation[1]), (core[2] + maxVariation[2])];

  if (size == 1) {
    return ['rgba(' + core[0] + ', ' + core[1] + ', ' + core[2] + ', ' + opacity + ')'];
  }

  let colors = [];
  for (let i = 0; i < size; i++) {
    let rgb = getHex(start[0] - (Math.round(maxVariation[0] / size * 4) * i)) + ', ' +
              getHex(start[1] - (Math.round(maxVariation[1] / size * 4) * i)) + ', ' +
              getHex(start[2] - (Math.round(maxVariation[2] / size * 4) * i));

    colors.push('rgba(' + rgb + ', ' + opacity + ')');
  }
  return colors;
}

function getHex(number) {
  number = (number < 0) ? 0 : number;
  return number;
}

function createSingleDataset(label, values) {
  return [{
      data: Array.from(values.values()),
      label: [label],
      borderColor: createShadesOfColor(values.size, 1),
      hoverBackgroundColor: createShadesOfColor(values.size, 1),
      backgroundColor: createShadesOfColor(values.size, 0.5),
      borderWidth: 1,
    }];
}

$(window).on('resize scroll', function() {
  var viewportTop = $(window).scrollTop();
  let links = $('#chartsMenu a');

  if (viewportTop < 300) {
    links.removeClass('active');
    links.eq(0).addClass('active');
  } else if (viewportTop < 800) {
    links.removeClass('active');
    links.eq(1).addClass('active');
  } else if (viewportTop < 1300) {
    links.removeClass('active');
    links.eq(2).addClass('active');
  } else if (viewportTop < 1800) {
    links.removeClass('active');
    links.eq(3).addClass('active');
  } else if (viewportTop < 2300) {
    links.removeClass('active');
    links.eq(4).addClass('active');
  } else if (viewportTop < 2800) {
    links.removeClass('active');
    links.eq(5).addClass('active');
  } else if (viewportTop < 3300) {
    links.removeClass('active');
    links.eq(6).addClass('active');
  } else if (viewportTop < 3800) {
    links.removeClass('active');
    links.eq(7).addClass('active');
  } else if (viewportTop < 4300) {
    links.removeClass('active');
    links.eq(8).addClass('active');
  }
});

$('#chartsMenu a').click(function(e){
  $('#chartsMenu a').removeClass('active');
  $(this).addClass('active');
  let position = $($(this).attr('href')).offset().top;
  $('html, body').animate({scrollTop: position - 200}, 500);
  e.preventDefault();
});

});
