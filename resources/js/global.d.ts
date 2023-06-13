import ziggyRouteFunction from "ziggy-js";

// Defines the function in all TS files and the script tags in Vue SFC.
declare global {
    const route: typeof ziggyRouteFunction;
}
