<div x-data="{
    questions: [
        { question: 'What is 2 + 2?', options: ['3', '4', '5', '6'], answer: '4' },
        { question: 'What is 5 × 3?', options: ['12', '15', '18', '20'], answer: '15' },
        { question: 'What is 10 - 7?', options: ['2', '3', '4', '5'], answer: '3' }
    ],
    currentQuestion: 0,
    score: 0,
    showResult: false,
    selectedAnswer: null,
    
    checkAnswer() {
        if (this.selectedAnswer === this.questions[this.currentQuestion].answer) {
            this.score++;
        }
        if (this.currentQuestion < this.questions.length - 1) {
            this.currentQuestion++;
            this.selectedAnswer = null;
        } else {
            this.showResult = true;
        }
    },
    
    restart() {
        this.currentQuestion = 0;
        this.score = 0;
        this.showResult = false;
        this.selectedAnswer = null;
    }
}">
    <div class="max-w-2xl mx-auto">
        <template x-if="!showResult">
            <div>
                <div class="mb-6">
                    <h3 class="text-xl font-semibold mb-2" x-text="questions[currentQuestion].question"></h3>
                    <div class="space-y-3">
                        <template x-for="option in questions[currentQuestion].options" :key="option">
                            <button 
                                @click="selectedAnswer = option"
                                :class="{
                                    'bg-blue-500 text-white': selectedAnswer === option,
                                    'bg-white text-gray-700 hover:bg-gray-100': selectedAnswer !== option
                                }"
                                class="block w-full p-4 rounded-lg border border-gray-200 transition-colors duration-200">
                                <span x-text="option"></span>
                            </button>
                        </template>
                    </div>
                </div>
                <button 
                    @click="checkAnswer()"
                    :disabled="!selectedAnswer"
                    :class="{ 'opacity-50 cursor-not-allowed': !selectedAnswer }"
                    class="w-full bg-green-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-600 transition-colors duration-200">
                    Next Question
                </button>
            </div>
        </template>
        
        <template x-if="showResult">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">Quiz Completed!</h3>
                <p class="text-xl mb-6">Your score: <span x-text="score"></span>/<span x-text="questions.length"></span></p>
                <button 
                    @click="restart()"
                    class="bg-blue-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-600 transition-colors duration-200">
                    Try Again
                </button>
            </div>
        </template>
    </div>
</div>