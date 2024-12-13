function countLeadingZerosMath(x) {
    const exponent = Math.floor(Math.log10(Math.abs(x)));
    return -exponent;
}

// Function to perform the magic increment
function magicInc(x, inc) {
    const floor = Math.floor(Math.log10(x));
    const a = Math.pow(10, floor);
    return a * (Math.floor(x / a) + inc);
}

// Main logic
function magic_inc(x, inc) {
    if ((x > 9 && x < 20 && inc === -1) || (x < -9 && x > -20 && inc === 1)) {
        return (inc === -1 ? 9 : -9);
    } else if (x > 9 || x < -9) {
        if (x < 0) {
            x = -x;
            x = magicInc(x, inc * -1);
            x = -x;
        } else {
            x = magicInc(x, inc);
        }
        return (Math.floor(x));
    } else if ((x >= 1 && x <= 9) || (x <= -1 && x >= -9)) {
        x = x + inc;
        return (Math.floor(x));
    } else if (x < 1 && x > -1) {
        const exponent = countLeadingZerosMath(x);
        x = Math.floor(x * Math.pow(10, exponent));
        let addDec = 0;
        if ((x === 1 && inc === -1) || (x === -1 && inc === 1)) {
            x = 0.9 * x;
            addDec = 1;
        } else {
            x = x + inc;
        }
        x = x / Math.pow(10, exponent);
        if (x === 1 || x === -1) {
           return Math.floor(x);
        } else {
           return (x.toFixed(exponent + addDec));
        }
    }
}