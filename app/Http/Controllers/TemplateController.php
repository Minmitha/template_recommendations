<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    // Predefined mock templates
    private $templates = [
        ['industry' => 'tech', 'name' => 'Tech Savvy', 'default_color' => 'blue'],
        ['industry' => 'fashion', 'name' => 'Fashion Forward', 'default_color' => 'pink'],
        ['industry' => 'food', 'name' => 'Culinary Delight', 'default_color' => 'green'],
        ['industry' => 'finance', 'name' => 'Financial Guru', 'default_color' => 'purple'],
        ['industry' => 'real_estate', 'name' => 'Luxury Living', 'default_color' => 'gold'],
        ['industry' => 'education', 'name' => 'Scholar Success', 'default_color' => 'orange'],
        ['industry' => 'healthcare', 'name' => 'Healthy Life', 'default_color' => 'teal'],
        ['industry' => 'travel', 'name' => 'Wanderlust', 'default_color' => 'aqua'],
        ['industry' => 'sports', 'name' => 'Athlete’s Edge', 'default_color' => 'red'],
        ['industry' => 'automotive', 'name' => 'Auto Drive', 'default_color' => 'gray'],
        ['industry' => 'media', 'name' => 'Media Buzz', 'default_color' => 'violet'],
        ['industry' => 'gaming', 'name' => 'Game Master', 'default_color' => 'black'],
        ['industry' => 'construction', 'name' => 'Build Strong', 'default_color' => 'brown'],
        ['industry' => 'beauty', 'name' => 'Beauty Bliss', 'default_color' => 'magenta'],
        ['industry' => 'non_profit', 'name' => 'Charity Hearts', 'default_color' => 'lightblue']
    ];


    public function submitForm(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'business_name' => 'required|string',
            'industry' => 'required|string',
            'color_scheme' => 'required|string',
        ]);

        // Extract the inputs
        $industry = strtolower($validated['industry']);
        $colorScheme = strtolower($validated['color_scheme']);

        // Find a template based on industry
        $template = collect($this->templates)->firstWhere('industry', $industry);

        if ($template) {
            // Adjust template's color based on user preference
            $template['recommended_color'] = $colorScheme;
        } else {
            return response()->json(['message' => 'No template found for this industry'], 404);
        }

        // Return JSON response (API)
        return response()->json([
            'business_name' => $validated['business_name'],
            'recommended_template' => $template
        ]);
    }
}
