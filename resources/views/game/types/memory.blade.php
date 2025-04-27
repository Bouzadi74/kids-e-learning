<div x-data="{
    cards: [
        { id: 1, value: '🐶', isFlipped: false, isMatched: false },
        { id: 2, value: '🐶', isFlipped: false, isMatched: false },
        { id: 3, value: '🐱', isFlipped: false, isMatched: false },
        { id: 4, value: '🐱', isFlipped: false, isMatched: false },
        { id: 5, value: '🐰', isFlipped: false, isMatched: false },
        { id: 6, value: '🐰', isFlipped: false, isMatched: false },
        { id: 7, value: '🦊', isFlipped: false, isMatched: false },
        { id: 8, value: '🦊', isFlipped: false, isMatched: false },
        { id: 9, value: '🦁', isFlipped: false, isMatched: false },
        { id: 10, value: '🦁', isFlipped: false, isMatched: false },
        { id: 11, value: '🐯', isFlipped: false, isMatched: false },
        { id: 12, value: '🐯', isFlipped: false, isMatched: false }
    ],
    flippedCards: [],
    matchedPairs: 0,
    isLocked: false,
    
    init() {
        this.shuffleCards();
    },
    
    shuffleCards() {
        for (let i = this.cards.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [this.cards[i], this.cards[j]] = [this.cards[j], this.cards[i]];
        }
    },
    
    flipCard(card) {
        if (this.isLocked || card.isFlipped || card.isMatched) return;
        
        card.isFlipped = true;
        this.flippedCards.push(card);
        
        if (this.flippedCards.length === 2) {
            this.isLocked = true;
            
            if (this.flippedCards[0].value === this.flippedCards[1].value) {
                this.flippedCards[0].isMatched = true;
                this.flippedCards[1].isMatched = true;
                this.matchedPairs++;
                this.flippedCards = [];
                this.isLocked = false;
            } else {
                setTimeout(() => {
                    this.flippedCards[0].isFlipped = false;
                    this.flippedCards[1].isFlipped = false;
                    this.flippedCards = [];
                    this.isLocked = false;
                }, 1000);
            }
        }
    },
    
    restart() {
        this.cards.forEach(card => {
            card.isFlipped = false;
            card.isMatched = false;
        });
        this.flippedCards = [];
        this.matchedPairs = 0;
        this.isLocked = false;
        this.shuffleCards();
    }
}" x-init="init">
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-4 gap-4 mb-6">
            <template x-for="card in cards" :key="card.id">
                <button 
                    @click="flipCard(card)"
                    :class="{
                        'bg-blue-500 text-white': card.isFlipped || card.isMatched,
                        'bg-gray-200': !card.isFlipped && !card.isMatched
                    }"
                    class="aspect-square flex items-center justify-center text-4xl rounded-lg transition-colors duration-200">
                    <span x-show="card.isFlipped || card.isMatched" x-text="card.value"></span>
                    <span x-show="!card.isFlipped && !card.isMatched">?</span>
                </button>
            </template>
        </div>
        
        <template x-if="matchedPairs === cards.length / 2">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-4">Congratulations!</h3>
                <p class="text-xl mb-6">You found all the pairs!</p>
                <button 
                    @click="restart"
                    class="bg-green-500 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-600 transition-colors duration-200">
                    Play Again
                </button>
            </div>
        </template>
    </div>
</div>