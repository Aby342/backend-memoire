<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dossier_medicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->text('antecedents')->nullable();
            $table->json('allergies')->nullable(); // tableau de chaînes
            $table->json('medicaments')->nullable(); // tableau de chaînes
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('dossier_medicals');
    }
};
