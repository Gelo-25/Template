        const display = document.getElementById('display');

        function clearDisplay() {
            display.value = '';
        }

        function deleteLastChar() {
            display.value = display.value.toString().slice(0, -1);
        }

        function appendToDisplay(value) {
            display.value += value;
        }

        function appendToDisplay1(value) {
            display.value += value;
        }

        function calculateResult() {
            let expression = display.value;

            // Check if the expression contains square root (√)
            if (expression.includes('√')) {
                // Replace √ with Math.sqrt() and calculate the result
                expression = expression.replace(/√(\d+)/g, (match, number) => {
                    return Math.sqrt(number);
                });
            }

            // Evaluate the expression using eval
            try {
                display.value = eval(expression);
            } catch (error) {
                display.value = 'Error';
            }
        }