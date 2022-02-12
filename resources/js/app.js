require("./bootstrap");

import Fuse from "fuse.js";
window.Fuse = Fuse;
import flatpickr from "flatpickr";
import _ from "lodash";
window.flatpickr = flatpickr;
window._ = require("lodash");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
