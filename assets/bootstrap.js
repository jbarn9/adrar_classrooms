// Démarrer Stimulus
import { Application } from "@hotwired/stimulus";
import { definitionsFromContext } from "@hotwired/stimulus-webpack-helpers";

// Démarrer l'application Stimulus
const app = Application.start();

// Charger tous les contrôleurs Stimulus
const context = require.context("./controllers", true, /\.js$/);
app.load(definitionsFromContext(context));

// Démarrer Turbo
import { start } from "@hotwired/turbo";
start();
